<template>
    <div>
       <div class="col-md-12">
            <div class="col-md-12 row mr-0">
                <div class="card-body row ">
                    <div class="col-md-6">
                        <div class="form-group" ><!-- {{ $errors->has('origen_suc') ? 'has-error' : ''}} -->
                            <label for="origen_suc" class="control-label" ><strong>Sucursal de Origen</strong></label>
                            <select name="origen_suc" id="origen_suc" class="form-control" :class="{'is-invalid':origen_valid}" v-model="origen_suc" ><!-- {{$errors->has('origen_suc')?'is-invalid':''}} -->
                                 <option v-for="sucursal in sucursales" :value="sucursal.id" :key="sucursal.id">{{sucursal.descripcion}}</option>
                            </select>                            
                              <!-- $errors->first('origen_suc', '<p class="form-text text-danger">:message</p>')  -->
                              <p v-show="origen_valid=='1'" class="form-text text-danger">error</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group "><!-- {{ $errors->has('destino_suc') ? 'has-error' : ''}} -->
                            <label for="descripcion" class="control-label"><strong>Sucursal de Destino</strong></label>
                            <select name="destino_suc" id="destino_suc" class="form-control" :class="{'is-invalid':dest_valid}" v-model="destino_suc"><!-- {{$errors->has('destino_suc')?'is-invalid':''}} -->
                               <option v-for="sucursal in sucursales" :value="sucursal.id" :key="sucursal.id">{{sucursal.descripcion}}</option>
                            </select>
                            <!-- {!! $errors->first('destino_suc', '<p class="form-text text-danger">:message</p>') !!} -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"><!--  {{ $errors->has('descripcion') ? 'has-error' : ''}} -->
                            <label for="descripcion" class="control-label"><strong>Descripción</strong></label>
                           <!-- { {$errors->has('descripcion')?'is-invalid':''}} -->
                            <input class="form-control " name="descripcion" type="text" id="descripcion" v-model="descripcion" ><!-- {{ isset($salida_af->descripcion) ? $salida_af->descripcion : old('descripcion')}} -->
                           <!--  {!! $errors->first('descripcion', '<p class="form-text text-danger">:message</p>') !!} -->
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="col-md-12 pt-3">
                <div class="card col-md-12">
                <div class="card-body">
                        <h5><strong>ITEMS</strong></h5>
                        <div class="table-responsive">
                            <table class="mb-0 table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Cod. Item</th>
                                        <th>Serie</th>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Clasificación</th>
                                        <th>Color</th>
                                        <th>Largo</th>
                                        <th>Ancho</th>
                                        <th>Alto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#</td>
                                        <td>Cod. Item</td>
                                        <td>Serie</td>
                                        <td>Nombre</td>
                                        <td>Marca</td>
                                        <td>Modelo</td>
                                        <td>Clasificación</td>
                                        <td>Color</td>
                                        <td>Largo</td>
                                        <td>Ancho</td>
                                        <td>Alto</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value=" crear">
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
/* import { required,sameAs} from 'vuelidate/lib/validators' */
export default {
    props: ['user','suc','token','errores','ori_suc','dest_suc'],
    computed:{
      
    },
    data() {
        return {
            /* origen_valid:false,
            dest_valid:false, */
            origen_valid: this.ori_suc,
            dest_valid: this.dest_suc,
            userlogued: JSON.parse(this.user),
			sucursales: JSON.parse(this.suc),
			errors: JSON.parse(this.errores),
            toke:this.token,
			/* errors: JSON.parse(this.errores), */
            origen_suc:0,
            destino_suc:0,
            descripcion:'',
            validaciones:{
                origen_valid:false,
                dest_valid:false,
            }
		};
	},
    /* validations:{
        origen_suc:{required},
        destino_suc:{required,sameAsPassword:not(sameAs('origen_suc'))},
        /* confir_contraseña:{required,sameAsPassword: not(sameAs('contraseña'))}, 
        validacionform:['origen_suc','destino_suc']
    }, */
    mounted(){
        /* this.verificar(); */
    },
	methods: {
        verificar:function(){
            /* this.errors.forEach(element => {
                console.log(element);
            }); */
        },
    }
    
}
</script>

<style>

</style>