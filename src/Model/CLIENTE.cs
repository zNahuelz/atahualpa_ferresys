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
    
    public partial class CLIENTE
    {
        public CLIENTE()
        {
            this.COMPROBANTE = new HashSet<COMPROBANTE>();
        }
    
        public int ID_CLI { get; set; }
        public string NOMBRES { get; set; }
        public string APELLIDOS { get; set; }
        public string DNI { get; set; }
        public string DIRECCION { get; set; }
        public string EMAIL { get; set; }
        public string TELEFONO { get; set; }
        public Nullable<System.DateTime> FECHA_REGISTRO { get; set; }
        public bool ACTIVO { get; set; }
    
        public virtual ICollection<COMPROBANTE> COMPROBANTE { get; set; }
    }
}