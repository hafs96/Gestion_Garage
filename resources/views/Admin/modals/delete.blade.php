<form action="{{route('SupprimerClt', $client->id)}}" method="post" enctype="multipart/form-data">
    {{ method_field('delete')}}
    {{ csrf_field()}}
    <div class="modal fade" id="ModalDelete{{$client->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer le client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Etes-vous sur de vouloir supprimer le client <strong>{{$client->Nom}} {{$client->Prenom}}</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</form>
