<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Solicitud de Activo</div>

                    <!-- <button type="button" class="btn mr-2 mb-2 btn-primary"
                        data-toggle="modal" data-target=".bd-example-modal-lg">
                        Large modal
                    </button>

                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas
                                        eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                                    </p>
                                    <p>
                                        Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
                                        laoreet rutrum faucibus dolor auctor.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div id="div_grilla" class="card-body dt-table table-responsive">
                        <table class="table table-hover table-striped" >
                            <thead>
                                <tr>
                                    <th>Obciones</th>
                                    <th>Nombre Completo</th>
                                    <th>CI</th>
                                    <th>Telefono</th>
                                    <th>Sector</th>
                                    <th>Area</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(colaborador,key) in colaboradores" :key="key">
                                    <td>
                                        <button type="button" class="btn btn-icon btn-outline-primary" data-toggle="modal" 
                                        @click.prevent="rellenar_frm(colaborador.id,colaborador.nombre,colaborador.ci,colaborador.sec_nom,colaborador.sec_id,colaborador.are_nom,colaborador.are_id)">
                                        Solicitar</button>
                                    </td>
                                    <td>{{colaborador.nombre+colaborador.apellido}}</td>
                                    <td>{{colaborador.ci}}</td>
                                    <td>{{colaborador.telefono}}</td>
                                    <td>{{colaborador.sec_nom}}</td>
                                    <td>{{colaborador.are_nom}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <nav class="pagination" >   <!-- v-show="!isEmpty" -->
                            <li v-if="paginate.current_page>1" class="page-item active">
                                <a href="#" class="page-link " @click.prevent="changePage(paginate.current_page-1)">
                                    <span >Atras</span>
                                </a>
                            </li>
                            <li v-for="page in pagesNumber" class="page-item" :key="page.id" :class="[ page == isActive ? 'active':'']">
                                <a href="#" class="page-link" @click.prevent="changePage(page)">
                                    {{page}}
                                </a>
                            </li>
                            <li class="page-item active" v-if="paginate.current_page<paginate.last_page">
                                <a href="#" class="page-link" @click.prevent="changePage(paginate.current_page+1)">
                                    <span >Siguiente</span>
                                </a>
                            </li>
                        </nav>
                    </div>

                    <div class="card-body">
                        <form accept-charset="UTF-8" enctype="multipart/form-data" id="formulario" hidden>
                            <input type="hidden" name="_token" :value="csrf" >
                            <input type="hidden" name="_token" :value="encargado_area['id']" >
                            <div class="main-card mb-3 card">
                                <div class="card-body"> 
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <label for="colaborador">Encargado de Area</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" id="colaborador" name="colaborador"  v-model="encargado_area['name']" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <label for="colaborador">Colaborador</label>
                                                <input type="text" id="colaborador" name="colaborador"  v-model="colaborador" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6=3 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <label for="ci">CI</label>
                                                <input type="text" id="ci" name="ci"  v-model="CI" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <label>Areas:</label>
                                                <input type="text" id="area_nombre" name="area_nombre"  v-model="area_nombre" class="form-control" disabled>
                                                <!-- <select class="form-control selectpicker" v-model="id_area">
                                                    <option value="0" selected disabled>seleccione...</option>
                                                    <option v-for="option in options_area " :key="option.value" v-bind:value="option.id">
                                                        {{ option.nombre }}
                                                    </option>
                                                </select> -->
                                            </div>    
                                        </div>
                                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <label>Sectores:</label>
                                                <input type="text" id="sector_nombre" name="sector_nombre"  v-model="sector_nombre" class="form-control" disabled>
                                                <!-- <select class="form-control selectpicker" v-model="id_sector">
                                                    <option value="0" selected disabled>seleccione...</option>
                                                    <option v-for="option in options_sector " :key="option.value" v-bind:value="option.id+option.nombre">
                                                        {{ option.nombre }}
                                                    </option>
                                                </select> -->
                                            </div>    
                                        </div>
                                    </div>   
<!--                                     <div class="row">
                                        <div class="col-lg-6 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <label>Tipo de Documento</label>
                                                <select name="tipo_doc" class="form-control selectpicker" id="tipo_doc" v-model="id_tipo_doc">
                                                    <option selected disabled value="0">Seleccionar...</option>                                
                                                    <option value="1">Solicitud</option>                                  
                                                    <option value="2">Asignacion</option>                                  
                                                    <option value="3">Respuesta</option>                                  
                                                </select> 
                                            </div>
                                        </div>   
                                    </div> -->
                                    <div class="row">
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <label for="descripcion">Descripcion</label>
                                                <textarea id="descripcion" name="descripcion" class="form-control selectpicker" v-model="descripcion"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <label>Itens:</label>
                                                <select class="form-control selectpicker" v-model="id_iten">
                                                    <option value="0" selected disabled>seleccione...</option>
                                                    <option v-for="option in options_iten " :key="option.value" v-bind:value="option">
                                                        {{ option.serie+' - '+option.foto }}
                                                    </option>
                                                </select>
                                            </div>    
                                        </div>
                                        <div class="col-lg-6 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <label for="observacion">Observacion</label>
                                                <input type="text" id="observacion" name="observacion"  v-model="observacion" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 mt-4">
                                            <div class="form-group">
                                            <button type="button" id="bt_add"  class="btn btn-primary mt-1" @click.prevent="agregar_articulo">Agregar</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                            <thead style="background-color:#A9D0F5">
                                                <tr>
                                                    <th>Opciones</th>
                                                    <th>Serie</th>
                                                    <th>Item</th>
                                                    <th>Observacion</th>
                                                </tr>
                                            </thead>                                        
                                            <tbody>
                                                <tr v-for="(ite, index) in articulos" :key="ite.id">
                                                    <td><button class="mb-2 mr-2 btn-icon btn btn-warning" @click.prevent="eliminar_articulo(index)"><i class="pe-7s-trash btn-icon-wrapper"></i> Quitar</button></td>
                                                    <td >{{ite.serie}}</td>                                         
                                                    <td >{{ite.iten}}</td>                                         
                                                    <td>{{ite.observacion}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6 col-sm-3 col-md-3 col-xs-12" > <!-- v-if="articulos.length > 0" -->
                                        <div class="form-group" >
                                            <button class="btn btn-primary" @click.prevent="insertar_maestro()">Guardar</button>
                                            <button class="btn btn-danger" type="reset" @click.prevent="ocultar_frm()">Cancelar</button>                                
                                        </div>
                                    </div>
                                </div>
                            </div>                
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'csrf',
            'ecargado'
        ],
        mounted() {
            console.log('Component mounted.'),
            this.get_itens(),
            /* this.get_area(),
            this.get_sector(), */
            this.get_Colaboradores()
        },
        data() {
            return{
                encargado_area:JSON.parse(this.ecargado),
                /* options_area:[],
                id_area:0,
                options_sector:[],
                id_sector:0, */
                options_iten:[],
                id_iten:0,
                id_tipo_doc:1,
                colaborador:'',
                colaborador_id:'',
                CI:0,
                area_nombre:'',
                area_id:0,
                sector_nombre:'',
                sector_id:0,
                descripcion:'',
                fecha_entrega:'',
                //detalle

                //item: JSON.parse(this.it),
                iditem:"",
                articulos:[],
                observacion: "",
                //otras variables
                errors:[],
                cont:'0',   

                //paginacion
                search:'',
                colaboradores:[],
                paginate:{
					'total':0,
					'current_page':0,
					'per_page':0,
					'last_page':0,
					'from':0,
					'to':0,
				},
				offset:2
            }   
        },
        computed: {
            isActive:function(){
				return this.paginate.current_page;
			},
			pagesNumber:function(){
				if (!this.paginate.to) {
					return [];
				}
				var from =this.paginate.current_page -this.offset;
				if (from<1) {
					from=1;
				}
				var to=from+(this.offset*2);
				if (to>=this.paginate.last_page) {
					to=this.paginate.last_page;
				}
				var pagesArray=[];
				while(from<=to){
					pagesArray.push(from);
					from++
				}
				return pagesArray;
			},
        },
        methods:{

            insertar_maestro:function(){
                let me=this;
                axios.post( '/insertarDocumento',{
                    area_IDencargado:this.encargado_area['id'],//---
                    colaborador_id:this.colaborador_id,//
                    id_tipo_doc:this.id_tipo_doc,//
                    descripcion:this.descripcion,//
                    detalle_articulos:this.articulos,
                    
                })
                .then((response)=>{
                    this.limpiar();
                    this.ocultar_frm();
                    if (response.data.id > 0) {
                        alert('INSERTADO SATISFACTORIAMENTE')
                    }else{
                        alert('error al insertar por favor rellene de manera correcta el formulario')
                    }
                });
            },

            rellenar_frm:function(id,colabora,cl_ci,area,id_area,sector,id_sector){
                this.colaborador_id=id;
                this.colaborador=colabora;
                this.CI=cl_ci;
                this.area_nombre=area;
                this.area_id=id_area;
                this.sector_nombre=sector;
                this.sector_id=id_sector;
                document.getElementById("formulario").hidden = false;
                document.getElementById("div_grilla").hidden = true;
            },

            ocultar_frm:function(){
                document.getElementById("formulario").hidden = true;
                document.getElementById("div_grilla").hidden = false;
            },

            get_Colaboradores:function(page){
                let me=this;
                axios.get('Colaboradoes?page='+page,{
                    params:{
                    'search':this.search,
                    }
                }).then(response=>{
                    me.colaboradores=response.data.src.data;
                    me.paginate=response.data.paginate;
                })
            },

            /* get_sector:function(){
                let me=this;
                axios.get('obtener_sectores').then(response=>{
                    console.log(response.data.getIten);
                    me.options_sector=response.data.getSector;
                })
            },

            get_area:function(){
                let me=this;
                axios.get('obtener_areas').then(response=>{
                    console.log(response.data.getIten);
                    me.options_area=response.data.getArea;
                })
            }, */

            get_itens:function(){
                let me=this;
                axios.get('obtener_itens').then(response=>{
                    console.log(response.data.getIten);
                    me.options_iten=response.data.getIten;
                })
            },

            agregar_articulo:function () {
              let me = this;
              
              if (me.options_iten &&  me.observacion ) {
                    this.articulos.push({
                        'itemid': me.id_iten.id,
                        'serie': me.id_iten.serie,
                        'iten': me.id_iten.foto,
                        'observacion': me.observacion,
                    }) ;
                    
                }
                if (!me.options_iten) {
                    me.errors.push('Seleccione un Item.');
                }
                if (!me.observacion) {
                    me.errors.push('Se Requiere una Descripción.');
                }
              this.limpiar_detalle();
            
              

            },

            limpiar_detalle(){
                this.id_iten =0,
                this.observacion = ""
            },

            limpiar(){
                this.id_iten =0,
                this.observacion = "",
                this.articulos = [],
                this.descripcion = "",
                this.colaborador_id="",
                this.colaborador="",
                this.CI="",
                this.area_nombre="",
                this.area_id="",
                this.sector_nombre="",
                this.sector_id=""
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
