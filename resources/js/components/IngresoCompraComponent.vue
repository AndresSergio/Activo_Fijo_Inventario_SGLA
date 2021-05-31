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
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                <button class="mb-2 mr-2 btn-icon btn-shadow btn-outline-2x btn btn-outline-secondary" v-on:click="volver()"> 
                    <i class="lnr-arrow-left btn-icon-wrapper"> </i> Volver
                </button>        
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

                                        <select name="origen_suc" id="origen_suc" class="form-control" v-model="iditem" ><!-- {{$errors->has('origen_suc')?'is-invalid':''}} -->
                                            <option selected disabled value="">Seleccionar...</option>   
                                            <option v-for="items in item" :value="items.id" :key="items.id">{{items.item}}</option>
                                        </select>  
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-2 col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <input type="text" name="descripcion" id="descripcion" class="form-control" v-model="descripcion"
                                        placeholder="Descripcion...">
                                    </div>
                                </div> 
                                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="number" name="cantidad" id="cantidad" class="form-control" v-model="cantidad"
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
                                                <td v-for="items in item" :key="items.id">{{ite.itemid}}</td>
                                                <td hidden>{{ite.id}}</td>
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
                    console.log("Registrado");
                });
                
                this.validaciones();

            },

            volver(){
                var url= '/ingresocompra'
                axios.get(url,{ 
                }).then(response=>{  
                    console.log("Volver");
                });
            },

            agregar_articulo:function () {
              let me = this;
              
              if (me.iditem &&  me.descripcion && me.cantidad > 0 && me.cantidad ) {
                    this.articulos.push({
                        'itemid': me.iditem,
                        'descripcion': me.descripcion,
                        'cantidad': me.cantidad

                    }) ;
                    
                }
                if (!me.iditem) {
                    me.errors.push('Seleccione un Item.');
                }
                if (!me.descripcion) {
                    me.errors.push('Se Requiere una Descripción.');
                }
                if (!me.cantidad) {
                    me.errors.push('La Cantidad debe ser mayor a 0.');
                }
              this.limpiar();
            
              

            },

            limpiar(){
                this.iditem ="",
                this.descripcion = "",
                this.cantidad = 1

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

            validar_detalle(e){
                let me=this;
                if (me.iditem &&  me.descripcion && me.cantidad > 0 && me.cantidad ) {
                    return true;
                }

                if (!me.iditem) {
                    me.errors.push('Seleccione un Item.');
                }
                if (!me.descripcion) {
                    me.errors.push('Se Requiere una Descripción.');
                }
                if (!me.cantidad) {
                    me.errors.push('La Cantidad debe ser mayor a 0.');
                } 
                e.preventDefault();
            }



        }
    }
</script>