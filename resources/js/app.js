require('./bootstrap');
import Swal from 'sweetalert2'

window.deleteConfirm = function(fromId, name) {
    //console.log(fromId);
    Swal.fire({
        title: 'Etes vous sûr de vouloir supprimer ' + name + '?',
        text: "Vous ne pourrez pas annuler cela!",
        icon: 'warning',
        showDenyButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        denyButtonText: 'Annuler',
        confirmButtonText: 'Oui, supprimer!'
    }).then((result) => {
        if (result.isConfirmed) {
            console.log(fromId);
            document.getElementById(fromId).submit();
        }
    })
}