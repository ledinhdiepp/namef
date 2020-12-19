
"""
 * @author nhphung
"""
from abc import ABC, abstractmethod, ABCMeta
from dataclasses import dataclass
from typing import List, Tuple
from AST import * 
from Visitor import *
from Utils import Utils
from StaticError import *
from functools import *

class Type(ABC):
    __metaclass__ = ABCMeta
    pass
class Prim(Type):
    __metaclass__ = ABCMeta
    pass
class IntType(Prim):
    pass
class FloatType(Prim):
    pass
class StringType(Prim):
    pass
class BoolType(Prim):
    pass
class VoidType(Type):
    pass
class Unknown(Type):
    pass

@dataclass
class ArrayType(Type):
    dimen:List[int]
    eletype: Type

@dataclass
class MType:
    intype:List[Type]
    restype:Type

@dataclass
class Symbol:
    name: str
    mtype:Type

class StaticChecker(BaseVisitor,Utils):
    def __init__(self,ast):
        self.ast = ast
        self.global_envi = [
Symbol("int_of_float",MType([FloatType()],IntType())),
Symbol("float_of_int",MType([IntType()],FloatType())),
Symbol("int_of_string",MType([StringType()],IntType())),
Symbol("string_of_int",MType([IntType()],StringType())),
Symbol("float_of_string",MType([StringType()],FloatType())),
Symbol("string_of_float",MType([FloatType()],StringType())),
Symbol("bool_of_string",MType([StringType()],BoolType())),
Symbol("string_of_bool",MType([BoolType()],StringType())),
Symbol("read",MType([],StringType())),
Symbol("printLn",MType([],VoidType())),
Symbol("printStr",MType([StringType()],VoidType())),
Symbol("printStrLn",MType([StringType()],VoidType()))]                           
 
    
    def check(self):
        return self.visit(self.ast,self.global_envi)

    # name : str
    def visitId(self, ast, c):
        check = self.lookup(ast.name, c[0], lambda x: x.name)
        if check is None:
            raise Undeclared(Identifier(), ast.name)
        if type(check.mtype) is Unknown and type(c[1]) is not Unknown:
            check.mtype = c[1]

        return check.mtype
    # decl : List[Decl]
    def visitProgram(self,ast, c):
        env = c.copy()
        for decl in ast.decl:
            if type(decl) is VarDecl:
                env += self.visit(decl, env)
            else: # FuncDecl
                env += self.checkFunctionRedeclared(decl, env)
        [self.visit(x, env) for x in ast.decl if type(x) is FuncDecl ]

    # variable : Id
    # varDimen : List[int]
    # varInit  : Literal
    def visitVarDecl(self, ast, c):
        check = self.lookup(ast.variable.name, c, lambda x: x.name)
        if check is not None:
            raise Redeclared(Variable(), ast.variable.name)
        
        eleType = Unknown()

        if ast.varInit is not None:
            eleType = self.visit(ast.varInit, c)
        elif ast.varDimen != []:
            eleType = ArrayType(ast.varDimen, Unknown())
        return [Symbol(ast.variable.name, eleType)]

    # name : Id
    # param : List[VarDecl]
    # body : Tuple[List[VarDecl],List[Stmt]]
    def visitFuncDecl(self, ast, c):
        env = c.copy()
        param = reduce(lambda x,y: x + self.visit(y, x), ast.param , [])
        local = reduce(lambda x,y: x + self.visit(y, x), ast.body[0] , [])

        env = param + env
        env = local + env

        [self.visit(x, env) for x in ast.body[1]]        

    # arr : Id
    # idx : List[Expr]
    def visitArrayCell(self, ast, c):
        check = self.lookup(ast.arr.name, c[0], lambda x: x.name)
        if check is None:
           raise Undeclared(Identifier(), ast.arr.name)
        if type(check.mtype) is not ArrayType:
            raise TypeMismatchInExpression(ast)
        for i in ast.idx:
            t = self.visit(i, (c[0], IntType()))
            if type(t) is not IntType:
                raise TypeMismatchInExpression(ast)

        if type(check.mtype.eletype) is Unknown and type(c[1]) is not Unknown:
            check.mtype.eletype = c[1]

        return check.mtype.eletype
    

    # op : str
    # left : Expr
    # right : Expr
    def visitBinaryOp(self, ast, c):
        it = Unknown()
        ot = Unknown()
        if ast.op in ['-','+','*','\\','%']:
            it = IntType()
            ot = IntType()
        elif ast.op in ['==','!=','<','>','<=','>=']:
            it = IntType()
            ot = BoolType()
        elif ast.op in ['-.','+.','*.','/']:
            it = FloatType()
            ot = FloatType()
        elif ast.op in ['=/=','<.','>.','<=.','>=.']:
            it = FloatType()
            ot = BoolType()
        
        lt = self.visit(ast.left, (c[0],it))
        rt = self.visit(ast.right, (c[0],it))
        if type(lt) is not type(it) or type(rt) is not type(it):
            raise TypeMismatchInExpression(ast)
        return ot

    # op : str
    # body : Expr
    def visitUnaryOp(self, ast, c):
        t = Unknown()
        if ast.op == '-':
            t = IntType()
        elif ast.op == '-.':
            t = FloatType()
        elif ast.op in ['!','&&','||']:
            t = BoolType()
        bt = self.visit(ast.body, (c[0], t))
        if type(bt) is not type(t):
            raise TypeMismatchInExpression(ast)
        return t

    # method : Id
    # param : List[Expr]
    def visitCallExpr(self, ast, c):
        check = self.lookup(ast.method.name, c[0], lambda x: x.name)

        if check is None:
           raise Undeclared(Function(), ast.method.name)
        
        if len(ast.param) != len(check.mtype.intype):
            
            raise TypeMismatchInExpression(ast)

        ets = list(map(lambda x: self.visit(x,(c[0],Unknown())),ast.param))
        if Unknown() in ets:
            raise TypeCannotBeInferred(ast)
        
        for i in range(len(ast.param)):
            if type(check.mtype.intype[i]) is not Unknown and type(check.mtype.intype[i]) is not type(ets[i]):
                raise TypeMismatchInExpression(ast)

        if type(check.mtype.restype) is Unknown: 
            if type(c[1]) is Unknown:
                raise TypeCannotBeInferred(ast)
            else:
                check.mtype.restype = c[1]
        check.mtype.intype = ets    
        return check.mtype.restype

    # value : int
    def visitIntLiteral(self, ast, c):
        return IntType()

    # value : float
    def visitFloatLiteral(self, ast, c):
        return FloatType()

    # value : str
    def visitStringLiteral(self, ast, c):
        return StringType()

    # value : bool
    def visitBooleanLiteral(self, ast, c):
        return BoolType()

    # lhs : LHS
    # rhs : Expr
    def visitAssign(self, ast, c):
        try:
            lt = self.visit(ast.lhs, (c, Unknown()))
            rt = self.visit(ast.rhs, (c,lt))
            if type(rt) is not Unknown and type(lt) is Unknown:
                lt = self.visit(ast.lhs, (c, rt))
            if type(rt) is Unknown and type(lt) is Unknown:
                raise TypeCannotBeInferred(ast)
            if type(lt) is VoidType or type(lt) is not type(rt):
                raise TypeMismatchInStatement(ast)
        
        except TypeCannotBeInferred:
            raise TypeCannotBeInferred(ast)
        

    # ifthenStmt : List[Tuple[Expr,List[VarDecl],List[Stmt]]]
    # elseStmt : Tuple[List[VarDecl],List[Stmt]]
    def visitIf(self, ast, c):
        env = c.copy()
        try:
            for i in ast.ifthenStmt:
                et = self.visit(i[0], (env,BoolType()))
                if type(et) is not BoolType:
                    raise TypeMismatchInStatement(ast)
                local = reduce(lambda x,y: x + self.visit(y,x),i[1],[])
                env = local + env
                [self.visit(x, env) for x in i[2]]
            if ast.elseStmt is not None:
                local = reduce(lambda x,y: x + self.visit(y,x),ast.elseStmt[0],[])
                env = local + env
                [self.visit(x, env) for x in ast.elseStmt[1]]
        except TypeCannotBeInferred:
            raise TypeCannotBeInferred(ast)

    # idx1 : Id
    # expr1 :Expr
    # expr2 :Expr
    # idx2 : Id
    # expr3 :Expr
    # loop : Tuple[List[VarDecl],List[Stmt]]
    def visitFor(self, ast, c):
        try:
            i1 = self.visit(ast.idx1, (c,Unknown()))
            e1 = self.visit(ast.expr1, (c,IntType()))
            if type(i1) is Unknown and type(e1) is not Unknown():
                i1 = self.visit(ast.idx1, (c,e1))
            e2 = self.visit(ast.expr2, (c,BoolType()))
            i2 = self.visit(ast.idx2, (c,Unknown()))
            e3 = self.visit(ast.expr3, (c,IntType()))
            if type(i2) is Unknown and type(e3) is not Unknown():
                i2 = self.visit(ast.idx2, (c,e3))
            if (type(i1) is Unknown and type(e1) is Unknown) or (type(i2) is Unknown and type(e3) is Unknown):
                raise TypeCannotBeInferred(ast)
            if type(e1) is not IntType or type(e2) is not BoolType or type(e3) is not IntType:
                raise TypeMismatchInStatement(ast)
            env = c.copy()
            if ast.loop is not None:
                local = reduce(lambda x,y: x + self.visit(y,x),ast.loop[0],[])
                env = local + env
                [self.visit(x, env) for x in ast.loop[1]]
        except TypeCannotBeInferred:
            raise TypeCannotBeInferred(ast)
    def visitBreak(self, ast, c):
        pass

    def visitContinue(self, ast, c):
        pass

    # expr : Expr
    def visitReturn(self, ast, c):
        try:
            rt = VoidType()
            if ast.expr is not None:
                rt = self.visit(ast.expr, (c,Unknown()))
            if type(rt) is Unknown:
                raise TypeCannotBeInferred(ast)
            return rt
        except TypeCannotBeInferred:
            raise TypeCannotBeInferred(ast)
    # sl : Tuple[List[VarDecl],List[Stmt]]
    # exp : Expr
    def visitDowhile(self, ast, c):
        try:
            env = c.copy()
            et = self.visit(ast.exp, (env,BoolType()))
            if type(et) is Unknown:
                raise TypeCannotBeInferred(ast)
            if type(et) is not BoolType:
                raise TypeMismatchInStatement(ast)
            if ast.sl is not None:
                local = reduce(lambda x,y: x + self.visit(y,x),ast.sl[0],[])
                env = local + env
                [self.visit(x, env) for x in ast.sl[1]]
        except TypeCannotBeInferred:
            raise TypeCannotBeInferred(ast)
    # exp : Expr
    # sl : Tuple[List[VarDecl],List[Stmt]]
    def visitWhile(self, ast, c):
        try:
            env = c.copy()
            if ast.sl is not None:
                local = reduce(lambda x,y: x + self.visit(y,x),ast.sl[0],[])
                env = local + env
                [self.visit(x, env) for x in ast.sl[1]]
            et = self.visit(ast.exp, (env,BoolType()))
            if type(et) is Unknown:
                raise TypeCannotBeInferred(ast)
            if type(et) is not BoolType:
                raise TypeMismatchInStatement(ast)
        except TypeCannotBeInferred:
            raise TypeCannotBeInferred(ast)
    # method : Id
    # param : List[Expr]
    def visitCallStmt(self, ast, c):
        check = self.lookup(ast.method.name, c, lambda x: x.name)
        if check is None:
            raise Undeclared(Function(), ast.method.name)
        
        if len(ast.param) != len(check.mtype.intype):
            
            raise TypeMismatchInStatement(ast)
        ets = list(map(lambda x: self.visit(x,(c,Unknown())),ast.param))
        if Unknown() in ets:
            raise TypeCannotBeInferred(ast)
        for i in range(len(ast.param)):
            if type(check.mtype.intype[i]) is not Unknown and type(check.mtype.intype[i]) is not type(ets[i]):
                raise TypeMismatchInStatement(ast)
        check.mtype.intype = ets
       

        if type(check.mtype.restype) is Unknown:
            check.mtype.restype = VoidType()

        elif type(check.mtype.restype) is not VoidType:
            raise TypeMismatchInStatement(ast)
         
        
    # name : Id
    # param : List[VarDecl]
    # body : Tuple[List[VarDecl],List[Stmt]]
    def checkFunctionRedeclared(self, ast, c):
        check = self.lookup(ast.name.name, c, lambda x: x.name)
        if check is not None:
            raise Redeclared(Function(),ast.name.name)
        
        param = []
        intype = []
        try:
            param = reduce(lambda x,y: x + self.visit(y, x), ast.param , [])
            intype = list(map(lambda x: x.mtype,param))
        
        except Redeclared as err:
            raise Redeclared(Parameter(), err.n)
        
        restype = Unknown()       

        returns = list(filter(lambda x: type(x) is Return, ast.body[1]))
        if returns == []:
            restype = VoidType()
        else:
            #TODO: check restype
            pass
        return [Symbol(ast.name.name, MType(intype,restype))]