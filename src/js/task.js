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


            console.log(e.target);
        })

        document.querySelector('body').appendChild(modal);
    }
})();