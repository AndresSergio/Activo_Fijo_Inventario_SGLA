
<form action="{{route('ingresocompra.estado',$ingre)}}" method="post" >
    @csrf
    @method('put')
    <div class="modal-body">
        <p class="mb-0">
            Esta Seguro que decesa cambiar el Estado? del Codigo: {{$ingre->numero_doc}}
        </p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Confirmar</button>
    </div>
</form>
