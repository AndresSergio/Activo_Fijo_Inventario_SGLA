<template>
    <div>
        <div class="row">
            <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
                <h3>Nuevo Ingreso</h3>
                <!-- <example-component></example-component> -->
                <div class="alert alert-danger" v-if="errors.length">
                    <ul>
                        <li v-for="error in errors" v-bind:key="error">{{error}}</li>
                    </ul>
                </div>
                <div class="alert alert-success" v-if="estado_c" >
                    
                        <h2>{{mensaje}}</h2>
                    
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                <a href="/ingresocompra" class="mb-2 mr-2 btn-icon btn-shadow btn-outline-2x btn btn-outline-secondary" >                    
                        <i class="lnr-arrow-left btn-icon-wrapper"> </i> Volver                    
                </a>        
            </div>
        </div>
            
        <form method="POST" action="/ingresocompra" accept-charset="UTF-8" enctype="multipart/form-data" @submit="validaciones">            
            <!-- @csrf   -->   
            <input type="hidden" name="_token" :value="csrf" >
            <div class="main-card mb-3 card">
                <div class="card-body">     
                    <div class="row">
                        <div class="col-lg-6 col-sm-3 col-md-3 col-xs-12">
                            <div class="form-group">
                                <label for="numero_doc">Número de Documento</label>
                                <input type="text" id="numero_doc" name="numero_doc"  v-model="numero_doc" class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12" hidden>
                            <div class="form-group">
                                <label for="id_tipo_ingr">Tipo Ingreso</label>
                                <input type="text" id="id_tipo_ingr" name="id_tipo_ingr" v-model="id_tipo_ingr"  class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12" hidden >
                            <div class="form-group">
                                <label for="id_sucursal">Sucursal</label>
                                <input type="text" id="id_sucursal" name="id_sucursal" v-model="id_sucursal"  class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-3 col-md-3 col-xs-12">
                            <div class="form-group">
                                <label>Tipo de Documento</label>
                                <select name="tipo_doc" class="form-control selectpicker" id="tipo_doc" v-model="tipo_doc">
                                    <option selected disabled value="">Seleccionar...</option>                                
                                    <option value="1">Factura</option>                                  
                                    <option value="2">Nota de Compra</option>                                  
                                    <option value="3">Recibo</option>                                  
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-3 col-md-3 col-xs-12" hidden>
                            <div class="form-group">
                                <label for="id_responsable">Responsable</label>
                                <input type="text" id="id_responsable" name="id_responsable"  v-model="id_responsable" value="1"  class="form-control" >
                            </div>
                        </div>            
                    </div>
                    
                    <div class="panel panel-primary">
                        <div class="panel-body">       
                            <div class="row">
                                <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                                    <div class="form-group">
                                        <label>Item</label>
                                        <!-- <select name="id_item" class="form-control selectpicker" id="id_item" v-model="item">
                                            <option selected disabled value="">Seleccionar un Item...</option>  
                                            <option v-for="items in item" v-bind:key="items.id" v-bind:value="item">{{items.item}}</option>
                                            
                                        </select> --> 

                                        <select name="origen_suc" id="origen_suc" class="form-control" v-model="iditem" :class="{'is-invalid':iditem_v}" @change="validacion_d()"><!-- {{$errors->has('origen_suc')?'is-invalid':''}} -->
                                            <option selected disabled value="">Seleccionar...</option>   
                                            <option v-for="items in item" :value="items" :key="items.id">{{items.item}}</option>
                                        </select>  
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                                    <div class="form-group">                            
                                        <h5 class="card-title">Select2 Bootstrap 4 Single Item</h5>
                                        <select class="multiselect-dropdown form-control">
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
                                                <option value="OR">Oregon</option>
                                                <option value="WA">Washington</option>
                                            </optgroup>                                            
                                            <optgroup label="Eastern Time Zone">
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="FL">Florida</option>
                                                <option value="GA">Georgia</option>
                                                <option value="IN">Indiana</option>
                                                <option value="ME">Maine</option>
                                                <option value="MD">Maryland</option>
                                                <option value="MA">Massachusetts</option>
                                                <option value="MI">Michigan</option>
                                                <option value="NH">New Hampshire</option>
                                                <option value="NJ">New Jersey</option>
                                                <option value="NY">New York</option>
                                                <option value="NC">North Carolina</option>
                                                <option value="OH">Ohio</option>
                                                <option value="PA">Pennsylvania</option>
                                                <option value="RI">Rhode Island</option>
                                                <option value="SC">South Carolina</option>
                                                <option value="VT">Vermont</option>
                                                <option value="VA">Virginia</option>
                                                <option value="WV">West Virginia</option>
                                            </optgroup>
                                        </select> 
                                    </div>
                                </div> -->
                                <div class="col-lg-4 col-sm-2 col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <input type="text" name="descripcion" id="descripcion" class="form-control" :class="{'is-invalid':descripcion_v}" @keydown="validacion_d()" v-model="descripcion"
                                        placeholder="Descripcion..."/>
                                    </div>
                                </div> 
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="number" name="cantidad" id="cantidad" class="form-control" :class="{'is-invalid':cantidad_v}" @keydown="validacion_d()" v-model="cantidad"
                                        placeholder="Cantidad...">
                                    </div>
                                </div> 
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 mt-4">
                                    <div class="form-group">
                                    <button type="button" id="bt_add"  class="btn btn-primary mt-1" @click.prevent="agregar_articulo">Agregar</button>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <tr>
                                                <th>Opciones</th>
                                                <th>Item</th>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>                                        
                                        <tbody>
                                            <tr v-for="(ite, index) in articulos" :key="ite.id">
                                                <td><button class="mb-2 mr-2 btn-icon btn btn-warning" @click.prevent="eliminar_articulo(index)"><i class="pe-7s-trash btn-icon-wrapper"></i> Quitar</button></td>
                                                <td >{{ite.item_nombre}}</td>                                            
                                                <td>{{ite.descripcion}}</td>
                                                <td>{{ite.cantidad}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-3 col-md-3 col-xs-12" v-if="articulos.length > 0">
                            <div class="form-group" >
                                <!-- {{-- <input name"_token" value="{{ csrf_token() }}" type="hidden"/> --}} -->
                                <!--Esto Valida que el token es del Usuario que ingreso-->
                                <button class="btn btn-primary" @click.prevent="agregar()">Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>                                
                            </div>
                        </div>
                    </div>  
                </div>
            </div>                
        </form>
    </div>
</template>
<script>
    export default { 
        props:[
            'csrf',
            'it'
        ],

        data() {
            return{
                numero_doc: "" , 
                id_tipo_ingr:"1",
                id_sucursal:"1",
                id_responsable:"1",
                tipo_doc:"",
                //detalle

                item: JSON.parse(this.it),
                iditem:"",
                articulos:[],
                descripcion: "",
                cantidad: 1,
                //otras variables
                errors:[],
                cont:'0',
                
                //variables de Validacion
                iditem_v: false,
                descripcion_v: false,
                cantidad_v: false,

                mensaje: '',
                estado_c: false,


            } 
            
        },
        
        methods:{

            agregar(){
                let me=this;
                var url = '/ingresocompra'
                axios.post(url,{
                numero_doc:me.numero_doc,
                id_tipo_ingr:me.id_tipo_ingr,
                id_sucursal:me.id_sucursal,
                tipo_doc:me.tipo_doc,
                id_responsable:me.id_responsable,
                detalle_articulos:me.articulos,

                }).then(response=>{  
                    me.mensaje = response.data.mensaje_c;
                    me.estado_c = response.data.estado_c;
                    me.limpiar();
                    me.limpiar_articulos();
                    
                }).catch(error=>{
                    me.mensaje = error.response.data.mensaje_c2;
                    me.estado_c = error.response.data.estado_c;
                  /*   console.log(error.response.data.mensaje_c2); */
                    me.limpiar();
                     me.limpiar_articulos();
                    
                });
                this.validaciones();
            },

            validacion_d(){

                let me = this;
                if (me.iditem_v ) {
                    me.iditem_v = false;
                }
                if (me.descripcion_v) {
                    me.descripcion_v = false;
                }
                if (me.cantidad_v) {
                    me.cantidad_v = false;
                }
            },

            agregar_articulo:function () {
              let me = this;
              me.estado_c=false;
              
              if (me.iditem &&  me.descripcion && me.cantidad > 0 ) {
                    this.articulos.push({
                        'itemid': me.iditem.id,
                        'item_nombre': me.iditem.item,
                        'descripcion': me.descripcion,
                        'cantidad': me.cantidad

                    }) ;
                    
                }
                if ( !me.iditem) {
                    me.iditem_v = true
                    me.errors.push('Seleccione un Item.');
                }
                if (!me.descripcion) {
                    me.descripcion_v = true
                    me.errors.push('Se Requiere una Descripción.');
                }
                if (!me.cantidad) {
                    me.cantidad_v = true
                    me.errors.push('La Cantidad debe ser mayor a 0.');
                }
              this.limpiar();

            },

            limpiar(){
                this.iditem ="",
                this.descripcion = "",
                this.cantidad = 1
            },
            limpiar_articulos(){
                this.numero_doc= "" , 
                this.id_tipo_ingr="1",
                this.articulos=[]

            },

            eliminar_articulo:function(p1){
                this.articulos.splice(p1,1)
            },

            validaciones: function(e){
            
                let me=this;
                if (me.numero_doc &&  me.tipo_doc ) {
                    return true;
                }

                me.errors = [];

                if (!me.numero_doc) {
                    me.errors.push('El Numero de Documento es obligatorio.');
                }
                if (!me.tipo_doc) {
                    me.errors.push('El Tipo de Documento es obligatorio.');
                }             

                e.preventDefault();
            },

            



        }
    }
</script>