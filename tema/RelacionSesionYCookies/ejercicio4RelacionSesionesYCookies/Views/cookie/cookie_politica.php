<?php
declare(strict_types=1);
?>
<div>
    
    <form method="GET" action="<?= BASE_URL ?>\cookie\XDD" novalidate>
    <label>
      <input type="checkbox" name="politica" value="aceptado" required>
      He leído y acepto la política de cookies
    </label>
    <label>
      <input type="checkbox" name="politica" value="no-aceptado" required>
      No acepto la política de cookies
    </label>
    <br><br>
    
    <button type="submit">Aceptar y continuar</button>
  </form>

<?php
echo "<h2>Estado politica de Cookie: $politica .</h2>";
?>
    <h2>Ejercicio numero 4</h2>
</div>