
[default]
goto=show

;[remove]
;menu=prop
;target=delete

;[delete]
;target=prop

[show]
direct=true

[preview]

[edit]
direct=true

[el]
menu=elements

[form]

[pub]
menu=pub
write=true

[prop]
editable=true

[changetemplate]
menu=prop
target=changetemplateselectelements

[changetemplateselectelements]
menu=prop
target=changetemplateselectelements

[replacetemplate]
goto=prop

[src]
menu=src

; Die Aktionen "rights", "aclform", "addacl" und "delacl" sind
; f�r Seiten,Ordner,Links und Dateien identisch.
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


