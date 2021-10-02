//Sección de codigo para cargar la tabla mediante JSON
const tabla = document.querySelector("#tabla");

async function cargarTablaAsync(){
    let info;
    const data = await fetch("../../model/produccion/table.php");
    const resulatdo = await data.json();
    info = resulatdo.map(e => {
        return `<tr>
                    <td>${e.id_produccion}</td>
                    <td>${e.nombre_apellido}</td>
                    <td>${e.area_sembrado}</td>
                    <td>${e.fecha}</td>
                    <td>${e.nombre}</td>
                    <td class="text-center">
                        <button type="button" class="btnEditar btn btn-success" data-bs-toggle="modal" data-bs-target="#update_modal" onclick="updateForm('${e.id_produccion}');">Edit <i class="far fa-edit text-white"></i></button> 
                        <button class="btn btn-danger" onclick="eliminaregistro('${e.id_produccion}');" >Delete <i class="far fa-minus-square text-white"></i></button>
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
    let fk_socio = document.getElementById('fk_socio');
    let area_sembrado = document.getElementById('area_sembrado');
    let fecha = document.getElementById('fecha');
    let fk_variedad = document.getElementById('fk_variedad');
    let alert = document.getElementById('alerta');

    function data() {

        let datos = new FormData();
        datos.append("fk_socio", fk_socio.value);
        datos.append("area_sembrado", area_sembrado.value);
        datos.append("fecha", fecha.value);
        datos.append("fk_variedad", fk_variedad.value);
        fetch('../../model/produccion/insert.php', {
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

    fetch("../../model/produccion/delete.php", {
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
let fk_socio_up = document.getElementById('fk_socio_up');
let area_sembrado_up = document.getElementById('area_sembrado_up');
let fecha_up = document.getElementById('fecha_up');
let fk_variedad_up = document.getElementById('fk_variedad_up');

function updateForm(id) {
    fetch("../../model/produccion/select_update.php", {
        method: "POST",
        body: id
    }).then(response => response.json()).then(response => {
        id_form.value = response.id_produccion;
        fk_socio_up.value = response.fk_socio;
        area_sembrado_up.value = response.area_sembrado;
        fecha_up.value = response.fecha;
        fk_variedad_up.value = response.fk_variedad;
    })
}
//Fin sección GET Update

//Sección Update donde se actualiza el registro
window.addEventListener('load', () => {

    let button = document.getElementById('formulario_update');
    let id_up = document.getElementById('id_up');
    let fk_socio_up = document.getElementById('fk_socio_up');
    let area_sembrado_up = document.getElementById('area_sembrado_up');
    let fecha_up = document.getElementById('fecha_up');
    let fk_variedad_up = document.getElementById('fk_variedad_up');
    let alert = document.getElementById('deletealert');
  
    function data() {
        let datos = new FormData();
        datos.append("id_up", id_up.value);
        datos.append("fk_socio_up", fk_socio_up.value);
        datos.append("area_sembrado_up", area_sembrado_up.value);
        datos.append("fecha_up", fecha_up.value);
        datos.append("fk_variedad_up", fk_variedad_up.value);
        fetch('../../model/produccion/update.php', {
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