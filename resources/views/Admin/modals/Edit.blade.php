<div id="editClientModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Modifier le client</h2>
        <form id="editClientForm">
            <!-- Vos champs de formulaire pour la modification du client -->
            <div class="form-group">
                <label for="editNom">Nom:</label>
                <input type="text" class="form-control" id="editNom" name="editNom">
            </div>
            <div class="form-group">
                <label for="editPrenom">Prénom:</label>
                <input type="text" class="form-control" id="editPrenom" name="editPrenom">
            </div>
            <!-- Ajoutez d'autres champs de formulaire selon vos besoins -->
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>

<style>
    /* Style pour le modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
