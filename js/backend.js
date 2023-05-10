// arrumar css
// validacao de email
// comentar codigo

const form = document.getElementById("form");

if (form) {
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dadosForm = new FormData(form);

    const dados = await fetch("dados.php", {
      method: "POST",
      body: dadosForm,
    });

    const resposta = await dados.json();
    console.log(resposta);

    if (resposta["status"]) {
      const alerta = document.createElement("div");
      alerta.classList.add("alerta-sucesso");
      alerta.innerText = resposta["msg"];
      document.getElementById("alerta-sucesso").appendChild(alerta);

      setTimeout(() => {
        alerta.remove();
      }, 2500);
      
    } else {
      const alerta = document.createElement("div");
      alerta.classList.add("alerta-erro");
      alerta.innerText = resposta["msg"];
      document.getElementById("alerta-erro").appendChild(alerta);

      setTimeout(() => {
        alerta.remove();
      }, 2500);
    }
  });
}



/*const form = document.getElementById("form");

if (form){
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        
        const dadosForm = new FormData(form);

        const dados = await fetch ("dados.php", {
            method: "POST",
            body: dadosForm
        });
        
        const resposta = await dados.json();
        console.log(resposta);

        if (resposta['status']){
            Swal.fire({
                text: resposta['msg'],
                icon: 'success',
                timer: 2500,
                showConfirmButton: false
              });
        }else {
            Swal.fire({
                text: resposta['msg'],
                icon: 'error',
                timer: 2500,
                showConfirmButton: false
              });
        }
    });

}
*/