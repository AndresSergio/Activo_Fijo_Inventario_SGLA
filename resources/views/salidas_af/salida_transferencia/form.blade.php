<!-- componente de salidas -->
<salidatransf-component 
    user="{{Auth::user()}}" 
    ori_suc="{{$errors->has('origen_suc')}}" 
    dest_suc="{{$errors->has('destino_suc')}}" 
    user="{{Auth::user()}}" 
    suc="{{$sucursales}}"
    token="{{csrf_token()}}"
    errores="{{$errors}}"
></salidatransf-component>
<!-- componente de salidas -->
<!-- errores="{{$errors}}"
    -->
