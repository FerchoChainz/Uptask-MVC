(function(){
    // show modal 'add task' button
    const newTaskBtn = document.querySelector('#add-task');
    newTaskBtn.addEventListener('click', showForm);


    // Creating modal form

    function showForm(){
        const modal = document.createElement('DIV');
        modal.classList.add('modal');
        modal.innerHTML =`
        <form class="formulario new-task">
            <legend>Agrega una nueva tarea</legend>
            <div class="campo">
            <label>Tarea</label>
            <input
                type="text"
                name="task"
                id="task"
                placeholder="Agrega una tarea al proyecto actual"
                />
            </div>

            <div class="opciones">
                <input type="submit" value="Agregar" class="submit-new-task"/>
                <button type="button" class="close-modal">Cancelar</button>
            </div>
        </form>
        `;

        setTimeout(() => {
            const formulario = document.querySelector('.formulario');
            formulario.classList.add('animate');
        }, 0);

        modal.addEventListener('click', function(e){
            e.preventDefault();

            // Using delegation

            if(e.target.classList.contains('close-modal')){

                const form = document.querySelector('.formulario');
                form.classList.add('close')
                setTimeout(() => {
                    // cancel modal
                    modal.remove();
                },500);

            }
            if(e.target.classList.contains('submit-new-task')){
                submitFormNewTask();
            }


            console.log(e.target);
        })

        document.querySelector('.dashboard').appendChild(modal);
    }

    function submitFormNewTask(){
        const task = document.querySelector('#task').value.trim();

        // if task is empty
        if(task === ''){
            // show error alert
            showAlert('El nombre de la tarea es obligatorio','error', document.querySelector('.formulario legend'));
            return;
        } 

        addTask(task);
    }

    // show alert
    function showAlert(message, type, ref){
        // prevent multiple alerts creations
        const prevAlert = document.querySelector('.alert')
        if(prevAlert){
            prevAlert.remove();
        }


        const alert = document.createElement('DIV');

        alert.classList.add('alert',type);
        alert.textContent = message;

        // insert the alert after of <legend>
        // the ref is 'formulario legend'
        ref.parentElement.insertBefore(alert, ref.nextElementSibling);

        // delete alert after 5 secs 
        setTimeout(() => {
            alert.remove();
        }, 3000);
    }

    // consult server to add a new task to the current project
    // Here is the comunication with the server to create tasks
    async function addTask(task){
        // build request
        const data = new FormData();
        data.append('name', task);
        data.append('projectId', getProject());

        // use async-await

        try {
            // url to send request
          const url = 'http://localhost:3000/api/task'  

            // to connect to the API
          const response = await fetch(url,{
            method: 'POST',
            body: data
          });

          const result = await response.json();
          console.log(result);

          showAlert(result.message,result.type, document.querySelector('.formulario legend'));

          if(result.type === 'succes'){
            setTimeout(() => {
                const modal = document.querySelector('.modal');
                modal.remove();
            }, 3000);
          }

        } catch (error) {
            console.log(error);
        }
    }


    function getProject(){
        // take the url
        const projectParams = new URLSearchParams(window.location.search);

        // to read the objects in the url
        const project = Object.fromEntries(projectParams.entries());

        return project.url;
    }

})();