<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Transfers/public/css/reserva.css">
    <title>Reserva</title>
</head>
<body>
    <div class="reserva-container">
        <h1>Formulario de Reserva</h1>
        <div class="reserva-info">
            <p>Por favor, primero debe registrar al usuario para crear la reserva</p>
            <p><a href="register.php" class="registrarUsuario">Registrar Usuario</a></p>
        </div>
        <form action="/Transfers/app/appController.php?controller=reserva&action=crearReserva" method="POST" id="reservaForm">
        <input type="hidden" name="action" value="crearReserva"> 
        <div>
            <label>Reserva para nuestros clientes</label><br><br>
            <label for="particular">Particular</label>
            <input type="radio" id="particular" name="id_tipo_reserva" value="1" checked>
            <label for="coorporativo">Empresa</label>
            <input type="radio" id="coorporativo" name="id_tipo_reserva" value="2" checked><br><br>    
            <p id="errorTipoReserva" class="error-menssage"></p>
        </div>   
            <!-- Tipo de trayecto -->
            <div class="input-group">
                <label for="tipoTrayecto">Seleccionar Trayecto</label>
                <select id="tipoTrayecto" name="id_destino" onchange="elegirTrayecto()" required>
                    <option value="">Seleccione una opción</option>
                    <option value="1"> Aereopuerto a Hotel </option>
                    <option value="2">Hotel a Aeropuerto</option>
                    <option value="3">Ida y Vuelta</option>
                </select>
                <p id="errorTrayecto" class="error-menssage"></p>
            </div>
            <h2>DETALLES DE LA RESERVA</h2>
            <!-- Trayecto de Aeropuerto a Hotel ---->
            <div id="aeropuertoHotel" style="display: none;">
                <h3>Trayecto: Aeropuerto a Hotel</h3>
                <div class="input-group">
                    <label for="diaLlegada">Día de Llegada</label>
                    <input type="date" id="diaLlegada" name="fecha_entrada">
                </div>
                <div class="input-group">
                    <label for="horaLlegada">Hora de Llegada</label>
                    <input type="time" id="horaLlegada" name="hora_entrada">
                    <p id="errorDiaLlegada" class="error-menssage"></p>
                </div>
                <div class="input-group">
                    <label for="numVueloLlegada">Número del vuelo</label>
                    <input type="text" id="numVueloLlegada" name="numero_vuelo_entrada" minlength="4" maxlength="10">
                    <p id="errVueLlegada" class="error-menssage"></p>
                </div>
                <div class="input-group">
                    <label for="aeropuertOrigen">Aeropuerto de Origen</label>
                    <input type="text" id="aeropuertOrigen" name="origen_vuelo_entrada" minlength="5" maxlength="15">
                    <p id="errOrigenVuelo" class="error-menssage"></p>
                </div>
            </div>
             <!-- Trayecto de Hotel a Aeropuerto -->
             <div id="HotelAereopuerto" style="display: none;">
                <h3>Trayecto: Hotel a Aeropuerto</h3>
                <div class="input-group">
                    <label for="hotelSalida">Día del Vuelo</label>
                    <input type="date" id="hotelSalida" name="fecha_vuelo_salida">
                </div>
                <div class="input-group">
                    <label for="horaSalida">Hora del Vuelo</label>
                    <input type="time" id="horaSalida" name="hora_vuelo_salida"> 
                    <p id="errDiaSalida" class="error-menssage"></p>
                </div>
                <div class="input-group">
                    <label for="numeroVuelo">Número de Vuelo</label>
                    <input type="text" id="numeroVuelo" name="numero_vuelo_salida" placeholder="AB1234" minlength="4" maxlength="10">
                    <p id="errNumVuelo" class="error-menssage"></p>
                </div>
                <div class="input-group">
                    <label for="horaRecogida">Hora de Recogida</label>
                    <input type="time" id="horaRecogida" name="hora_recogida">
                    <p id="errRecogida" class="error-menssage"></p>
                </div>
            </div>
            <!-- Hotel, número de viajeros, email y apellido -->
            <div class="input-group">
                <label for="idHotel">Hotel de Destino/Recogida</label>
                <select  id="idHotel" name="id_hotel" required>
                    <option value="">Seleccione un hotel</option>
                    <option value="1">Hotel Sunset</option>
                    <option value="2">Hotel Verano</option>
                </select> 
                <p id="errorHotel" class="error-menssage"></p>  
            </div>
            <div class="input-group">
                <label for="numViajeros">Número de Viajeros</label>
                <input type="number" id="numViajeros" name="num_viajeros" min="1" required>
                <p id="errNumViajero" class="error-menssage"></p>  
            </div>
            <div class="input-group">
                <label for="vehiculo">Selecciona un vehiculo</label>
                <select id="vehiculo" name="id_vehiculo" required>
                    <option value="">Seleccione una opción</option>
                    <option value="1">Deportivo </option>
                    <option value="2">Turismo</option>
                    <option value="3">Familiar</option>
                </select>
                <p id="errorVehiculo" class="error-menssage"></p>
            </div>
            <div class="input-group">
                <label for="emailReserva">Email</label>
                <input type="email" id="emailReserva" name="email_cliente" required>
                <p id="errorEmail" class="error-menssage"></p>
            </div>
            <button type="submit" class="reserva-btn">Realizar Reserva</button>
        </form>
    </div>
    <footer class="reservaFooter">
        <p>&copy; 2023 Transfers. Todos los derechos reservados.</p>
    </footer>
   
    <script src="/Transfers/public/js/reserva.js" defer></script>
</body>

</html>