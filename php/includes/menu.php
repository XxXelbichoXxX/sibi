<nav>
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li class="submenu">
                    <a>Bienes informáticos</a>
                    <ul>
                        <li><a href="inventario.php?inv=cpu">CPU</a></li>
                        <li><a href="inventario.php?inv=laptop">Laptops</a></li>
                        <li><a href="inventario.php?inv=impresora">Impresoras y scanners</a></li>
                        <li><a href="inventario.php?inv=telefonia">Telefonos IP</a></li>
                        <li><a href="inventario.php?inv=energia">UPS</a></li>
                    </ul>
                </li>
                <li><a href="inventario.php?inv=personal">Consulta de personal</a></li>
                <?php
                    if($_SESSION['role'] == 'Administrador'){
                        echo '<li><a href="inventario.php?inv=utilerias">Utilerias</a></li>';
                    }
                ?>
                <li><a href="../php/includes/cerrar_sesion.php">Salir</a></li>
            </ul>
        </nav>