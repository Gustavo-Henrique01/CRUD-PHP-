

<style> 
@import url('https://fonts.googleapis.com/css2?family=Anton&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

.container {
    display: flex; 
    flex-wrap: wrap; /* Permite que os itens sejam empilhados em telas menores */
    gap: 2rem;
    justify-content: center;
    max-width: 100%;
}

.box1 {
    display: flex; 
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 3rem; /* Reduzi a lacuna para melhorar o espaçamento */
    width: 100%; /* Garante que o conteúdo se ajuste ao contêiner */
    max-width: 400px; /* Definindo uma largura máxima para evitar que o texto se espalhe muito em telas maiores */
    text-align: center; /* Centraliza o texto */
}

.figuere img {
    max-width: 100%;
    height: auto; /* Garante que a imagem mantenha a proporção correta */
}

h2 {
    font-family: "Anton", sans-serif;
    font-weight: 400;
    font-size: 3rem; /* Reduzi o tamanho da fonte para uma melhor aparência em telas menores */
    color: white;
}

p {
    font-family: "Poppins", sans-serif;
    font-size: 1.2rem; /* Reduzi o tamanho da fonte para uma melhor aparência em telas menores */
    color: white;
    margin: 0; /* Remova a margem padrão para melhor alinhamento */
}

.main-container {
    background-color: #22333b;
    padding: 1.5rem;
   
    width: 100%;
    max-width: 100%; 
}

</style> 


<div class="container">

<div class="box1"> 
<h2>Bem-vindo ao Sistema</h2>
<p>Registre e gerencie seus pedidos de clientes facilmente!</p>
</div>

<figure class="figure">
        <img src="https://cdn-icons-png.flaticon.com/512/5164/5164023.png"  alt="">
</figure>
