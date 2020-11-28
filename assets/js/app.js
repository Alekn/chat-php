//updateActivity();

// BUSQUEDA DE USUARIOS EXISTENTES
let usuarios;

let selector = document.querySelector('#usuarios');

fetch('user').then(function(response) {
    return response.json();
}).then(function(json) {
    usuarios = json;
    for (let i = 0; i < usuarios.length; i++) {
        const usuario = usuarios[i];
        
        let option = document.createElement('option');
        
        option.value = usuario['user_id'];
        option.textContent = usuario['username'];
        
        selector.appendChild(option);
    }
}).catch(function(err) {
    console.log('Problema con el fetch: ' + err.message);
});

// BUSQUEDA DE USUARIOS PENDIENTES POR ACEPTAR
let pendientes;

let solicitudes = document.querySelector('#solicitudes-realizadas');

fetch('pendiente').then(function(response) {
    return response.json();
}).then(function(json) {
    pendientes = json;

    for (let i = 0; i < pendientes.length; i++) {
        const usuario = pendientes[i];

        let elemento = document.createElement('li');
        let nombre = document.createElement('a');

        nombre.href = '#';
        nombre.textContent = usuario['username'];

        elemento.appendChild(nombre);

        solicitudes.appendChild(elemento);
    }
}).catch(function(err) {
    console.log('Problema con el fetch: ' + err.message);
});

// BUSQUEDA DE PETICIONES DE AMISTAD
let peticiones;

let invitaciones = document.querySelector('#solicitudes-pendientes');

fetch('solicitud').then(function(response) {
    return response.json();
}).then(function(json) {
    peticiones = json;

    for (let i = 0; i < peticiones.length; i++) {
        const usuario = peticiones[i];

        let elemento = document.createElement('li');
        let addBtn = document.createElement('a');

        addBtn.href = '#';
        addBtn.textContent = usuario['username'];
        addBtn.setAttribute('class', 'button small icon fa-check');

        elemento.appendChild(addBtn);

        invitaciones.appendChild(elemento);

        addBtn.addEventListener('click', function() {
            window.location.reload();
            fetch('contact', {
                method: 'POST',
                credentials: 'include',
                headers: {
                    'Accept': 'application/json, text/plain, */*',
                    "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
                },
                body: 'delete=' + JSON.stringify(usuario)
            }).then(function(resp) {
                return resp.json();
            }).then(function(js) {
                console.log(js);
            }).catch(function(e) {
                console.log('Problema en el POST: ' + e.message);
            });

        });
    }
}).catch(function(err) {
    console.log('Problema con el fetch: ' + err.message);
});

// BUSQUEDA DE CONTACTOS

let contactos;

let table = document.querySelector('#contactos');

fetch('contacto').then(function(response) {
    return response.json();
}).then(function(json) {
    contactos = json;

    for (let i = 0; i < contactos.length; i++) {
        const contacto = contactos[i];

        let spanEdo = document.createElement('span');

        updateStatus(spanEdo, contacto);
        setTimeout(updateStatus(spanEdo, contacto), 5000);

        let columna = document.createElement('tr');
        let filaContacto = document.createElement('td');
        let filaEdo = document.createElement('td');
        let filaChat = document.createElement('td');
        let filaDlt = document.createElement('td');
    
        let spanName = document.createElement('span');
        let chatBtn = document.createElement('a');
        let deleteBtn = document.createElement('a');
        
        chatBtn.setAttribute('class', 'button alt small');
        deleteBtn.setAttribute('class', 'button small');
    
        filaContacto.appendChild(spanName);
        filaEdo.appendChild(spanEdo);
        filaChat.appendChild(chatBtn);
        filaDlt.appendChild(deleteBtn);
    
        spanName.textContent = contacto['username'];
        
        chatBtn.textContent = 'Chat';
        deleteBtn.textContent = 'Eliminar';
        columna.appendChild(filaContacto);
        columna.appendChild(filaEdo);
        columna.appendChild(filaChat);
        columna.appendChild(filaDlt);
    
        table.appendChild(columna);

        chatBtn.addEventListener('click', function() {
            //$.noConflict();
            make_chat_dialog_box(contacto['user_id'], contacto['username']);
            init_dialog(contacto['user_id']);
        });
        
        deleteBtn.addEventListener('click', function() {
            table.removeChild(columna);
        });
    }
    
}).catch(function(err) {
    console.log('Problema con el fetch: ' + err.message);
});

// FUNCIONES

setInterval(function(){
    updateStatus();
    updateActivity();
}, 5000);


    // FETCH ESTADO Y USER EN TABLE
function updateActivity() {

    fetch('actividad').then(function(response) {
        return response.json();
    }).then(function(json) {
        console.log(json);
        //setTimeout(updateActivity, 5000);
    }).catch(function(err) {
        console.log('Problema con el fetch: ' + err.message);
        //setTimeout(updateActivity, 5000);
    });  
}

// BUSQUEDA DE CONTACTOS

function updateStatus(spanEdo, contacto) {

    fetch('status', {
        method: 'POST',
        credentials: 'include',
        headers: {
            'Accept': 'application/json, text/plain, */*',
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
        },
        body: 'current=' + JSON.stringify(contacto)
    }).then(function(res) {
        return res.text();
    }).then(function(text) {
        spanEdo.textContent = text;
        //setTimeout(updateStatus(spanEdo, contacto), 50000);
    }).catch(function(e) {
        console.log('Problema en el Status: ' + e.message);
        //setTimeout(updateStatus(spanEdo, contacto), 50000);
    });

}
    // jQuery relacionadas
function make_chat_dialog_box(to_user_id, to_user_name) {
    let modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="Tienes un chat con '+to_user_name+'">';
    modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
    modal_content += '</div>';
    modal_content += '<div class="form-group">';
    modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
    modal_content += '</div><div class="form-group" align="right">';
    modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="button special small">Send</button></div></div>';
    $('#user_model_details').html(modal_content);
}

function init_dialog(to_user_id) {
    $('#user_dialog_'+to_user_id).dialog({
        autoOpen:false,
        width:400
    });
    $('#user_dialog_'+to_user_id).dialog('open');
}