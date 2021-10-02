//Sección de codigo para cargar la tabla mediante JSON
const tabla = document.querySelector("#tabla");

async function cargarTablaAsync(){
    let info;
    const data = await fetch("../../model/referente/table.php");
    const resulatdo = await data.json();
    info = resulatdo.map(e => {
        return `<tr>
                    <td>${e.id_referente}</td>
                    <td>${e.nombre}</td>
                    <td>${e.cedula}</td>
                    <td>${e.telefono}</td>
                    <td>${e.whatsapp}</td>
                    <td class="text-center">
                        <button type="button" class="btnEditar btn btn-success" data-bs-toggle="modal" data-bs-target="#update_modal" onclick="updateForm('${e.id_referente}');">Edit <i class="far fa-edit text-white"></i></button> 
                        <button class="btn btn-danger" onclick="eliminaregistro('${e.id_referente}');" >Delete <i class="far fa-minus-square text-white"></i></button>
                    </td>
                </tr>`;        
    }).join('');
    tabla.innerHTML = info;
}

cargarTablaAsync();
//Fin de sección de tabla 

//Sección de insertar datos a la tabla
window.addEventListener('load', () => {

    let button = document.getElementById('formulario_insert');
    let nombre = document.getElementById('nombre');
    let cedula = document.getElementById('cedula');
    let telefono = document.getElementById('telefono');
    let whatsapp = document.getElementById('whatsapp');
    let alert = document.getElementById('alerta');

    function data() {

        let datos = new FormData();
        datos.append("nombre", nombre.value);
        datos.append("cedula", cedula.value);
        datos.append("telefono", telefono.value);
        datos.append("whatsapp", whatsapp.value);
        fetch('../../model/referente/insert.php', {
            method: 'POST',
            body: datos
        }).then(Response => Response.json())
        .then(({ success }) => {
            if (success === 1) {
                alerta_success();
                formulario_insert.reset();
                cargarTablaAsync();
            } else {
                alerta_fail();
            }
        });

    }

    function alerta_success() {
        alert.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            Guardado Correctamente!
        </div>
        </div>
        `;
    } 

    function alerta_fail() {
        alert.innerHTML = `
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
            Imposible guardar el registro!
        </div>
        </div>
        `;
    } 

    button.addEventListener('submit', (e) => {
        e.preventDefault();
        data();
    });

});
//Fin de sección insertar

//Sección de eliminar registros de la base de datos
let alert = document.getElementById('deletealert');

function eliminaregistro(id) {

    fetch("../../model/referente/delete.php", {
        method: "POST",
        body: id
        }).then(response => response.text()).then(response => {
        console.log(response);
        cargarTablaAsync();
        alerta_delete();
    });
}


function alerta_delete() {
    alert.innerHTML = `
    <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
    <div>
        Se elimino el registro!
    </div>
    </div>
    `;
} 
//Fin de sección eliminar

//Sección GET Update en donde se seleccionan datos y se pintan en la modal
let id_form = document.getElementById('id_up');
let nombre_up = document.getElementById('nombre_up');
let cedula_up = document.getElementById('cedula_up');
let telefono_up = document.getElementById('telefono_up');
let whatsapp_up = document.getElementById('whatsapp_up');

function updateForm(id) {
    fetch("../../model/referente/select_update.php", {
        method: "POST",
        body: id
    }).then(response => response.json()).then(response => {
        id_form.value = response.id_referente;
        nombre_up.value = response.nombre;
        cedula_up.value = response.cedula;
        telefono_up.value = response.telefono;
        whatsapp_up.value = response.whatsapp;
    })
}
//Fin sección GET Update

//Sección Update donde se actualiza el registro
window.addEventListener('load', () => {

    let button = document.getElementById('formulario_update');
    let id_up = document.getElementById('id_up');
    let nombre_up = document.getElementById('nombre_up');
    let cedula_up = document.getElementById('cedula_up');
    let telefono_up = document.getElementById('telefono_up');
    let whatsapp_up = document.getElementById('whatsapp_up');
    let alert = document.getElementById('deletealert');
  
    function data() {
        let datos = new FormData();
        datos.append("id_up", id_up.value);
        datos.append("nombre_up", nombre_up.value);
        datos.append("cedula_up", cedula_up.value);
        datos.append("telefono_up", telefono_up.value);
        datos.append("whatsapp_up", whatsapp_up.value);
        fetch('../../model/referente/update.php', {
            method: 'POST',
            body: datos
        }).then(Response => Response.json())
        .then(({ success }) => {
            if (success === 1) {
                cargarTablaAsync();
                $('#update_modal').modal('hide');
                alerta_success();
            } else {
                alerta_fail();
            }
        });

    }

    function alerta_success() {
        alert.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            Actualizado Correctamente!
        </div>
        </div>
        `;
    } 

    function alerta_fail() {
        alert.innerHTML = `
        <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div>
            No se hizo la actualizacion!
        </div>
        </div>
        `;
    } 

    button.addEventListener('submit', (e) => {
        e.preventDefault();
        data();
    });

});
//Fin sección actualizar