/ **
 * @OA \ Schema (
 * title = "Solicitud de proyecto de tienda",
 * description = "Almacenar datos del cuerpo de la solicitud del proyecto",
 * tipo = "objeto",
 * requerido = {"nombre"}
 *)
 * /

clase StoreProjectRequest { / ** 

    
     * @OA \ Propiedad (
     * título = "nombre",
     * description = "Nombre del nuevo proyecto",
     * ejemplo = "Un buen proyecto"
     *)
     *
     * @var cadena
     * / public $ nombre ;
    

    / **
     * @OA \ Propiedad (
     * título = "descripción",
     * description = "Descripción del nuevo proyecto",
     * ejemplo = "Esta es la descripción del nuevo proyecto"
     *)
     *
     * @var cadena
     * / public $ descripción ;
    

    / **
     * @OA \ Propiedad (
     * título = "id_autor",
     * description = "ID del autor del nuevo proyecto",
     * formato = "int64",
     * ejemplo = 1
     *)
     *
     * @var entero
     * / public $ id_autor ; }