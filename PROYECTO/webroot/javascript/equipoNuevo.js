window.addEventListener('load',async function() {

    event.preventDefault();

    const categorias = await getCategorias("idSelectCategoria");
  });