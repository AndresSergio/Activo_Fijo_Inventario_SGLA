<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Solicitud de Activo</div>

                    <div class="card-body">
                        <form accept-charset="UTF-8" enctype="multipart/form-data" id="formulario">
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
                                    <div class="row">
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
                                        <div class="col-lg-6 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <label>Fecha de Entrega:</label>
                                                <input type="date" name="fecha_ini" class="form-control selectpicker" v-model="fecha_entrega" min="2021-01-00T00:00">
                                            </div>
                                        </div>   
                                    </div>
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
                                        <div class="col-lg-6 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group">
                                                <label>Itens:</label>
                                                <select class="form-control selectpicker" v-model="id_iten">
                                                    <option value="0" selected disabled>seleccione...</option>
                                                    <option v-for="option in options_iten " :key="option.value" v-bind:value="option.id">
                                                        {{ option.serie+' - '+option.foto }}
                                                    </option>
                                                </select>
                                            </div>    
                                        </div>
                                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 mt-4">
                                            <div class="form-group">
                                            <button type="button" id="bt_add"  class="btn btn-primary mt-1" @click.prevent="agregar_articulo">Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-3 col-md-3 col-xs-12"> <!-- v-if="articulos.length > 0" -->
                                        <div class="form-group" >
                                            <button class="btn btn-primary" @click.prevent="">Guardar</button>
                                            <button class="btn btn-danger" type="reset" @click.prevent="">Cancelar</button>                                
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
            'encargado',
            'documnt'
        ],
        mounted() {
            this.get_itens()
        },
        data() {
            return{
                encargado_area:JSON.parse(this.encargado),

                options_iten:[],
                id_iten:0,
                id_tipo_doc:0,
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
                cantidad: 1,
                //otras variables
                errors:[],
                cont:'0',   

                //paginacion
                search:'',
                colaboradores:[],
            }   
        },
        methods: {
            get_itens:function(){
                let me=this;
                axios.get('obtener_itens').then(response=>{
                    console.log(response.data.getIten);
                    me.options_iten=response.data.getIten;
                })
            },
        },
    }
</script>
