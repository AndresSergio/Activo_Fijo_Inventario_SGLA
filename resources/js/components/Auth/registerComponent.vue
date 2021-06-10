<template>
  <div>
        <div class="container h-100 justify-content-center align-items-center">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card m-5">
                        <div class="card-header">Registar Usuario</div>

                        <div class="card-body">
                            <div class="alert alert-success text-center" v-if="mensaje" >
                                <h2>{{mensaje}}</h2>
                            </div>
                            <form method="POST" action="regitrar">
                               <!--  @csrf -->

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" :class="{'is-invalid':$v.nombre.$error}" v-model.trim="$v.nombre.$model" name="name" ><!-- @error('name') is-invalid @enderror -->
                                        <p class="text-danger m-0" v-if="$v.nombre.$error">El Nombre es requerido</p>
                                        <!-- @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido</label>

                                    <div class="col-md-6">
                                        <input id="apellido" type="text" class="form-control " name="apellido" :class="{'is-invalid':$v.apellido.$error}" v-model.trim="$v.apellido.$model"><!-- @error('name') is-invalid @enderror -->
                                        <p class="text-danger m-0" v-if="$v.apellido.$error">El Apellido es requerido</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Ci" class="col-md-4 col-form-label text-md-right">Ci</label>

                                    <div class="col-md-6">
                                        <input id="ci" type="text" class="form-control " name="ci" value="" maxlength="8" :class="{'is-invalid':$v.ci.$error}" v-model.trim="$v.ci.$model" autofocus><!-- @error('name') is-invalid @enderror -->
                                        <p class="text-danger m-0" v-if="$v.ci.$error">El Ci es requerido</p>
                                        <p class="text-danger m-0" v-if="errores.ci">{{errores.ci[0]}}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                                    <div class="col-md-6">
                                        <input id="telefono" type="text" class="form-control " name="telefono" maxlength="8" value="" required autocomplete="telefono"  :class="{'is-invalid':$v.telefono.$error}" v-model.trim="$v.telefono.$model" autofocus><!-- @error('name') is-invalid @enderror -->
                                        <p class="text-danger m-0" v-if="$v.telefono.$error">El Teléfono es requerido</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="direccion" class="col-md-4 col-form-label text-md-right">Dirección</label>

                                    <div class="col-md-6">
                                        <input id="direccion" type="text" v-model="direccion" class="form-control " name="direccion" value="" required autocomplete="direccion" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tipo_resp" class="col-md-4 col-form-label text-md-right">Tipo de Responsable</label>
                                    <div class="col-md-6">
                                        <select name="tipo_resp" class="form-control col-md-12" :class="{'is-invalid':tipo_resp_val}" v-model="tipo_resp_id" @change="verificar('tipo_resp_id')" >
                                            <option selected disabled value="0">Seleccionar...</option>   
                                            <option v-for="tipo_r in tipo_resp" :value="tipo_r.id" :key="tipo_r.id">{{tipo_r.descripcion}}</option>
                                        </select>
                                        <p class="text-danger m-0" v-show="tipo_resp_val">Seleccione una opción</p>
                                    </div>
                                </div>
                                <div class="form-group row" v-show="mostrar_area">
                                    <label for="area" class="col-md-4 col-form-label text-md-right">Área</label>
                                    <div class="col-md-6">
                                        <select name="area" class="form-control col-md-12" :class="{'is-invalid':area_val}" v-model="area_id" @change="verificar('area_id')">
                                            <option selected disabled value="0">Seleccionar...</option>   
                                            <option v-for="area in areas" :value="area.id" :key="area.id">{{area.nombre}}</option>
                                        </select>
                                        <p class="text-danger m-0" v-show="area_val">Seleccione una opción</p>
                                    </div>
                                </div>
                                <div class="form-group row" v-show="mostrar_sector">
                                    <label for="sector" class="col-md-4 col-form-label text-md-right">Sector</label>
                                    <div class="col-md-6">
                                        <select name="sector" class="form-control col-md-12" :class="{'is-invalid':sector_val}" v-model="sector_id" @change="verificar('sector_id')" >
                                            <option selected disabled value="0">Seleccionar...</option>   
                                            <option v-for="sector in sector_por_areas(area_id)" :value="sector.id" :key="sector.id">{{sector.descripcion}}</option>
                                        </select>
                                         <p class="text-danger  m-0" v-show="sector_val">Seleccione una opción</p>
                                    </div>
                                </div>
                                <div class="form-group row" v-show="mostrar_turno">
                                    <label for="turno" class="col-md-4 col-form-label text-md-right">Turno</label>
                                    <div class="col-md-6">
                                        <select name="turno" class="form-control col-md-12" :class="{'is-invalid':turno_val}" v-model="turno_id" @change="verificar('turno_id')">
                                            <option selected disabled value="0">Seleccionar...</option>   
                                            <option v-for="turno in turnos" :value="turno.id" :key="turno.id">{{turno.descripcion}}</option>
                                        </select>
                                         <p class="text-danger  m-0" v-show="turno_val">Seleccione una opción</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right"  >Correo</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control " name="email" :class="{'is-invalid':$v.correo.$error}" v-model.trim="$v.correo.$model" autocomplete="email">
                                        <p class="text-danger m-0" v-if="$v.correo.$error">El Correo es requerido</p>
                                        <p class="text-danger m-0" v-if="errores.email">{{errores.email[0]}}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password" :class="{'is-invalid':$v.password.$error}" v-model.trim="$v.password.$model"> 
                                        <p class="text-danger m-0" v-if="$v.password.$error">El Password es requerido</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" :class="{'is-invalid':$v.password_confir.$error}" v-model.trim="$v.password_confir.$model">
                                        <p class="text-danger m-0" v-if="$v.password_confir.$error">La confirmación es requerida</p>
                                        <p class="text-danger m-0" v-if="!$v.password_confir.sameAsPassword">La contraseña no coincide.</p>
                                        
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" @click.prevent="verificar_preregistro()">
                                            Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>

<script>
import { required,sameAs } from 'vuelidate/lib/validators';

export default {
    props: [],
    computed:{
       

    },
    validations: {
        nombre: {required},
        apellido: {required},
        ci: {required},
        telefono: {required},
        correo: {required},
        password: {required},
        password_confir:{required,sameAsPassword: sameAs('password')},
        
        validacionform:['nombre','apellido','ci','telefono','correo','password','password_confir']
    },
    data() {
        return {
            nombre:'',
            apellido:'',
            ci:'',
            telefono:'',
            direccion:'',
            correo:'',
            password:'',
            password_confir:'',
            mensaje:'',
            area_id:0,
            area_val:false,
            tipo_resp_id:0,
            tipo_resp_val:false,
            sector_id:0,
            sector_val:false,
            turno_id:0,
            turno_val:false,
            mostrar_sector:false,
            mostrar_area:false,
            mostrar_turno:false,
            tipo_resp:[],
            sectores:[],
            areas:[],
            turnos:[],
            errores:[],
		};
	},
    created(){
        this.responsable();
        this.sector();
        this.area();
        this.turno();
        this.$v.$reset();
       
    },
    mounted(){
        
    },
	methods: {
        responsable:function(){
            let me=this;
            var url = '/get_tipo_resp'
                axios.get(url).then(response=>{  
                    me.tipo_resp=response.data.tipo_resp;
                }).catch(error=>{
                   
                    
                });
        },
        sector:function(){
            let me=this;
            var url = '/get_sector'
                axios.get(url).then(response=>{  
                    me.sectores=response.data.sectores;
                }).catch(error=>{
                   
                    
                });
        },
        area:function(){
            let me=this;
            var url = '/get_area'
                axios.get(url).then(response=>{  
                    me.areas=response.data.areas;
                }).catch(error=>{
                   
                    
                });
        },
        turno:function(){
            let me=this;
            var url = '/get_turno'
                axios.get(url).then(response=>{  
                    me.turnos=response.data.turnos;
                }).catch(error=>{
                   
                    
                });
        },
        verificar:function(p1){//cambia los selectbox son validos
            this.roles();
            let me=this;
            switch (p1) {
                case 'tipo_resp_id':
                    me.tipo_resp_val=false;
                    break;
                case 'sector_id':
                    me.sector_val=false;
                    break;
                case 'turno_id':
                    me.turno_val=false;
                    break;
                case 'area_id':
                    me.area_val=false;
                    break;
                default:
                    break;
            }
        },
        roles:function(){//muestra los diferentes campos a rellenar
            switch (this.tipo_resp_id) {
                case 1:
                    this.mostrar_sector=false;
                    this.mostrar_area=false;
                    this.mostrar_turno=false;
                    break;
                case 2:
                    this.mostrar_area=true;
                    this.mostrar_sector=true;
                    this.mostrar_turno=false;
                    break;
                case 3:
                    this.mostrar_area=true;
                    this.mostrar_sector=true;
                    this.mostrar_turno=true;
                    break;
            
                default:
                    break;
            }
        },
        verificar_preregistro:function(){//vinculada al boton de registrar
          
            let me=this;
            this.$v.$touch()
            if (me.tipo_resp_id==0){
                me.tipo_resp_val=true;
            }if (me.sector_id==0) {
                me.sector_val=true;
            }if (me.turno_id==0) {
                me.turno_val=true;
            }if (me.area_id==0) {
                me.area_val=true;
            }if(!this.$v.validacionform.$invalid){
                switch (me.tipo_resp_id) {
                    case 1:
                            this.registrar_user();//llama a la peticion axios
                        break;
                    case 2:
                        if (me.area_id!=0) {
                            this.registrar_user();
                        }
                        break;
                    case 3:
                        if (me.area_id!=0&&me.turno_id!=0&&me.sector_id!=0) {
                            this.registrar_user();
                        }
                        break;
                    default:
                        break;
                }
            }

           
        },
        registrar_user:function(){//funcion que va al controlador para registrar al user
                        let me=this;
                        var url = '/registrar'
                        axios.post(url,{
                        nombre: me.nombre,
                        apellido: me.apellido,
                        direccion: me.direccion,
                        ci: me.ci,
                        telefono: me.telefono,
                        telefono: me.telefono,
                        email: me.correo,
                        password: me.password,
                        password_confirmation:me.password_confir,
                        tipo_resp_id: me.tipo_resp_id,
                        sector_id: me.sector_id,
                        turno_id: me.turno_id,
                        area_id: me.area_id
                        }).then(response=>{  
                               me.mensaje=response.data.mensaje;
                               me.limpiar();
                        }).catch(error=>{
                            /* console.log(error.response.data.errors); */
                            if (error.response.status == 422) {
                                me.mensaje='';
                                this.errores= error.response.data.errors;
                            }
                            
                        });
        },
        sector_por_areas: function (sector_filter) {
            return this.sectores.filter(function (n) {
                return n.id_area === sector_filter
            })
        },
        limpiar(){

            this.nombre='';
            this.apellido='';
            this.direccion='';
            this.ci='';
            this.telefono='';
            this.telefono='';
            this.correo='';
            this.password='';
            this.password_confir='';
            this.tipo_resp_id=0;
            this.sector_id=0;
            this.turno_id=0;
            this.area_id=0;
            this.$v.$reset();
        }

    }
    
}
</script>
<style>

</style>