//------------------------------------------------------------------------------
// <auto-generated>
//    Este código se generó a partir de una plantilla.
//
//    Los cambios manuales en este archivo pueden causar un comportamiento inesperado de la aplicación.
//    Los cambios manuales en este archivo se sobrescribirán si se regenera el código.
// </auto-generated>
//------------------------------------------------------------------------------

namespace atahualpa_ferresys.Model
{
    using System;
    using System.Collections.Generic;
    
    public partial class PROVEEDOR
    {
        public PROVEEDOR()
        {
            this.PRODUCTO = new HashSet<PRODUCTO>();
        }
    
        public int ID_PROV { get; set; }
        public string NOMBRE { get; set; }
        public string RUC { get; set; }
        public string DIRECCION { get; set; }
        public string TELEFONO { get; set; }
        public string EMAIL { get; set; }
        public string DESCRIPCION { get; set; }
        public Nullable<System.DateTime> FECHA_REGISTRO { get; set; }
        public bool ACTIVO { get; set; }
    
        public virtual ICollection<PRODUCTO> PRODUCTO { get; set; }
    }
}