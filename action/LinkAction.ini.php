
[default]
goto=prop

[edit]
menu=edit
target=save

[save]
goto=edit

[prop]
menu=prop
target=saveprop
editable=true

[saveprop]
goto=prop

[delete]
goto=prop

[rights]
menu=rights
action=object
editable=true

[aclform]
menu=rights
target=addacl
action=object

[addacl]
goto=rights

[delacl]
goto=rights

[menu]
edit=edit
prop=prop
rights=rights,aclform
menu=edit,prop,rights