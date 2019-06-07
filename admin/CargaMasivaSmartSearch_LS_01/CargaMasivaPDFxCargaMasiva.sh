#!/bin/bash

sql_host="localhost"
slq_usuario="ubuntuCarga"
sql_password="*ubuntuCarga123"
sql_database="haptrack_docu"
url_smart="/var/www/html/smartsearc/swdoc/HapAdmcom/docs/"

cd PDFxCargaMasiva
#Obtiene información de cargue cliente carpeta y tipo de archivo del txt _ClienteCarpetaCarga.txt
while read LINEA; do
  PARTES=( $(echo $LINEA| tr : " ") )
done < ../_ClienteCarpetaCarga.info

#Renombrar sin espacios
#for FILE in *.pdf  *.PDF ;
#do
#  NEWFILE=( $(echo $FILE | sed 's/ /_/g') );
#  mv "$FILE" $NEWFILE ;
#done

#obtiene los archivos a cargar
for f in *.*
do
  echo $f
  sql_insert=$sql_insert"INSERT INTO documentos (idcliente, fecha, nombre, adjunto, padre, tipo, tamano) values ('${PARTES[0]}', now(),'$f', '${PARTES[0]}"/"${PARTES[1]}"/"$f','${PARTES[1]}', 'application/${f#*.}','$(stat -c %s "$f")'); ";
  mv "$f" $url_smart${PARTES[0]}"/"${PARTES[1]}"/$f";
done
echo "..Procesando..."

#Conectarse a la BD
sql_args="-h $sql_host -u $slq_usuario -p$sql_password -D $sql_database -s -e"
mysql $sql_args "$sql_insert";


#echo ${PARTES[1]};
