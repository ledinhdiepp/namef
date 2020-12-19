/**
* Le Dinh Diep - 1610712
*/

grammar BKIT;

@lexer::header {
from lexererr import *
}

@lexer::members {
def emit(self):
    tk = self.type
    if tk == self.UNCLOSE_STRING:       
        result = super().emit();
        raise UncloseString(result.text);
    elif tk == self.ILLEGAL_ESCAPE:
        result = super().emit();
        raise IllegalEscape(result.text);
    elif tk == self.ERROR_CHAR:
        result = super().emit();
        raise ErrorToken(result.text); 
    else:
        return super().emit();
}

options{
	language=Python3;
}
program
    :   
        vardecl* funcdecl* EOF
    ;

vardecl
    :
        VAR COLON varlist SEMI
    ;

varlist
    :
       var (COMMA var)*
    ;

var
    :
        variable (ASSIGN literals)?
    ;

literals
    :
        ILIT
    |   FLIT
    |   SLIT
    |   BLIT
    ;

funcdecl
    :
        FUNCTION COLON ID parameters? body
    ;

parameters
    :
        PARAMETER COLON paramlist
    ;

paramlist
    :
        variable (COMMA variable)*
    ;

variable
    :
        ID  (LSB ILIT RSB)*
    ;

body
    :
        BODY COLON vardecl* funcstatement* ENDBODY DOT
    ;

funcstatement
    :
        returnstm
    |   callstm
    |   continuestm
    |   breakstm
    |   dowhilestm
    |   whilestm
    |   forstm
    |   ifstm
    |   assignstm
    ;

returnstm
    :
        RETURN exp? SEMI
    ;

callstm
    :
        funccall SEMI
    ;

continuestm
    :
        CONTINUE SEMI
    ;

breakstm
    :
        BREAK SEMI
    ;

ifstm
    :
        IF exp THEN stmlist elifpart* elsepart? ENDIF DOT
    ;

elifpart
    :
        ELSEIF exp THEN stmlist
    ;

elsepart
    :
        ELSE stmlist
    ;

assignstm
    :
        (ID | elementexp) ASSIGN exp SEMI
    ;

forstm
    :
        FOR LB ID ASSIGN exp COMMA exp COMMA ID ASSIGN exp RB DO stmlist ENDFOR DOT
    ;

whilestm
    :
        WHILE exp DO stmlist ENDWHILE DOT
    ;

dowhilestm
    :
        DO stmlist WHILE exp SEMI
    ;

stmlist
    :
        vardecl+ funcstatement*
    |   funcstatement+
    ;

exp
    :   
        exp (IEQ|INEQ|ILT|IGT|ILEQ|IGEQ|FNEQ|FLT|FGT|FLEQ|FGEQ) exp1
    |   exp1
    ;

exp1
    :   
        exp1 (COJ|DIJ) exp2
    |   exp2
    ;

exp2
    :   
        exp2 (IADD|FADD|ISUB|FSUB) exp3
    |   exp3
    ;

exp3
    :   
        exp3 (IMUL|FMUL|IDIV|FDIV|IREM) exp4
    |   exp4
    ;

exp4
    :   
        NEG exp5
    |   exp5
    ;

exp5
    :
        (ISUB | FSUB) exp6
    |   exp6
    ;

exp6
    :
        elementexp
    |   LB exp RB
    |   ID
    |   literals
    |   funccall
    ;

elementexp
    :
        ID indexop+
    ;

indexop
    :
        LSB exp RSB
    ;

funccall
    :
        ID LB arglist? RB
    ;


arglist
    :
        exp (COMMA exp)*
    ;

// separators

LB  :   '('     ;

RB  :   ')'     ;

LSB :   '['     ;

RSB :   ']'     ;

COLON
    :
        ':'     
    ;

DOT :   '.'     ;

COMMA
    :
        ','     
    ;

SEMI
    :
        ';'     
    ;

// operators

IADD
    :
       '+'
    ;

IDIV
    :
       '\\'
    ;

FDIV
    :
       '/'
    ;

IREM
    :
       '%'
    ;

NEG :   '!'     ;

COJ :   '&&'    ;

DIJ :   '||'    ;

IEQ :   '=='    ;

INEQ
    :
       '!='
    ;

ILT :   '<'     ;

IGT :   '>'     ;

ILEQ
    :
       '<='    
    ;

IGEQ
    :
       '>='
    ;

FNEQ
    :
       '=/='
    ;

FLT :   '<.'    ;

FGT :   '>.'    ;

FLEQ
    :
       '<=.'    
    ;

FGEQ
    :
      '>=.'
    ;

FADD
    :
       '+.'
    ;

IMUL
    :
       '*'
    ;

FMUL
    :
       '*.'
    ;

ISUB
    :
       '-'
    ;

FSUB
    :
       '-.'
    ;

ASSIGN
    :
       '='
    ;

// keywords

BODY
    :
       'Body'
    ;

ELSE
    :
       'Else'
    ;

ENDFOR
    :
       'EndFor'
    ;

IF  :   'If'    ;

VAR :   'Var'   ;

BREAK
    :
       'Break'
    ;

ELSEIF
    :
       'ElseIf'
    ;

ENDWHILE
    :
       'EndWhile'
    ;

PARAMETER
    :
       'Parameter' 
    ;

WHILE
    :
       'While' 
    ;

CONTINUE
    :
       'Continue' 
    ;

ENDBODY
    :
       'EndBody'
    ;

FOR :   'For'   ;

RETURN
    :
       'Return'
    ;

DO  :   'Do'   ;

ENDIF
    :
       'EndIf'
    ;

FUNCTION
    :
       'Function' 
    ;

THEN
    :
       'Then' 
    ;
    


// identifiers

ID  :   [a-z][A-Za-z_0-9]* ;

// literals

ILIT
    :
        '0'
    |   [1-9][0-9]*
    |   '0'[xX][0-9A-F]+
    |   '0'[oO][0-7]+
    ;

FLIT
    :
        INTPART DECPART? EXPPART
    |   INTPART DECPART
    ;

fragment
INTPART
    :   
        [0-9]+
    ;

fragment
DECPART
    :
       '.'[0-9]*
    ;

fragment
EXPPART
    :
       [eE][+-]?[0-9]+
    ;

BLIT
    :
       'True'
    |   'False'
    ;

SLIT
    :   
        '"' ( ESC| ~('\\' | '"'))* '"'
            {
                self.text = self.text[1:-1];
            }
    ;

WS  :   [ \t\f\r\n]+ -> skip    ; // skip spaces, tabs, form feeds, carriage returns, newlines

COMMENT
    :
        '**' .*? '**' -> skip 
    ;

ERROR_CHAR
    :   
        .
        {
            raise ErrorToken(self.text)
        }
    ;

UNCLOSE_STRING
    :
       '"' (ESC | ~('\\' | '"'))*
            {
                raise UncloseString(self.text[1:]);
            }
    ;

ILLEGAL_ESCAPE
    :
        '"' (ESC | ~[\r"\\])*'\\' .
            {
                raise IllegalEscape(self.text[1:]);
            }
    ;

fragment
ESC :   '\\' [btnfr\\'] |'\'"'  ;