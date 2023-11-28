




<div>
    <h1>Déjanos un mensaje</h1>
    <form action="" method="POST">
        @csrf
        <label>
            Nombre:
            <br>
            <input type="text" name="name">
        </label>
        <br>
        <label>
            Correo:
            <br>
            <input type="mail" name="correo">
        </label>
        <br>
        <label>
            Mensaje:
            <br>
            <textarea name="mensaje" rows="4" ></textarea>
        </label>
        <br>
        <button type="submit">Enviar mensaje</button>
    </form>
</div>
