/ **
 * @OA \ Schema (
 * title = "Proyecto",
 * description = "Modelo de proyecto",
 * @OA \ Xml (
 * nombre = "Proyecto"
 *)
 *)
 * / class Proyecto {
 


    / **
     * @OA \ Propiedad (
     * título = "ID",
     * descripción = "ID",
     * formato = "int64",
     * ejemplo = 1
     *)
     *
     * @var entero
     * / id $ privado ;
    

    / **
     * @OA \ Propiedad (
     * title = "Nombre",
     * description = "Nombre del nuevo proyecto",
     * ejemplo = "Un buen proyecto"
     *)
     *
     * @var cadena
     * / public $ nombre ;
    

    / **
     * @OA \ Propiedad (
     * title = "Descripción",
     * description = "Descripción del nuevo proyecto",
     * ejemplo = "Esta es la descripción del nuevo proyecto"
     *)
     *
     * @var cadena
     * / public $ descripción ;
    

    / **
     * @OA \ Propiedad (
     * title = "Creado en",
     * description = "Creado en",
     * ejemplo = "2020-01-27 17:50:45",
     * formato = "fecha y hora",
     * tipo = "cadena"
     *)
     *
     * @var \ DateTime
     * / private $ created_at ;
    

    / **
     * @OA \ Propiedad (
     * title = "Actualizado en",
     * description = "Actualizado en",
     * ejemplo = "2020-01-27 17:50:45",
     * formato = "fecha y hora",
     * tipo = "cadena"
     *)
     *
     * @var \ DateTime
     * / private $ updated_at ;
    

    / **
     * @OA \ Propiedad (
     * title = "Eliminado en",
     * description = "Eliminado en",
     * ejemplo = "2020-01-27 17:50:45",
     * formato = "fecha y hora",
     * tipo = "cadena"
     *)
     *
     * @var \ DateTime
     * / privado $ eliminado_at ;
    

    / **
     * @OA \ Propiedad (
     * title = "ID de autor",
     * description = "ID del autor del nuevo proyecto",
     * formato = "int64",
     * ejemplo = 1
     *)
     *
     * @var entero
     * / public $ id_autor ;
    


    / **
     * @OA \ Propiedad (
     * título = "Autor",
     * description = "Modelo de usuario del autor del proyecto"
     *)
     *
     * @var \ App \ Virtual \ Models \ Usuario
     * / $ autor privado ; }
    