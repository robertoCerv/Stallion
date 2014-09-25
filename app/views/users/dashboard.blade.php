@extends('layout.layout')

@section('tasks')
	<h2>User Profile</h2>

	<button id="crear-usuarios" class="btn btn-primary" data-toggle="modal" data-target="#modalCrear">
		Crear usuario
	</button>
@stop

@section('read')
	<div id="mensajesUsuario"></div>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Avatar</th>
				<th>ID</th>
				<th>Usuario</th>
				<th>Email</th>
				<th>Tipo</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $key => $user)
			<tr class="usuario" name="{{ $user->id }}">
				<td><img src="{{ $user->avatar }}" class="img-responsive img-circle avatar-user" alt="Avatar"></td>
				<td>{{ $user->id }}</td>
				<td>{{ $user->username }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->type }}</td>
				<td class="current-button">
					<i class="glyphicon glyphicon-chevron-down text-muted"></i>
				</td>
			</tr>
			<tr class="panel-user" style="display: none;">
				<td colspan="6">
					<div class="panel panel-primary">
	                    <div class="panel-heading">
	                        <h3 class="panel-title">Perfil de usuario</h3>
	                    </div>
	                    <div class="panel-body">
	                        <div id="perfilUsuario" class="row">
                        		<div class="col-md-3 col-lg-3 imagenPerfil"></div>
	                            <div id="informacionPerfil" class="col-md-9 col-lg-9">
		                            <h3 class="nameUsuario"></h3><br>
		                            <table class="table table-user-information">
		                                <tbody>
		                                    <tr>
		                                        <td>Nombre completo</td>
		                                        <td class="fullnameUsuario"></td>
		                                    </tr>
		                                    <tr>
		                                        <td>Correo electrónico</td>
		                                        <td class="emailUsuario"></td>
		                                    </tr>
		                                    <tr>
		                                        <td>Tipo de usuario</td>
		                                        <td class="typeUsuario"></td>
		                                    </tr>
		                                    <tr>
		                                        <td>Sitio web</td>
		                                        <td class="urlUsuario"></td>
		                                    </tr>
		                                    <tr>
		                                    	<td>Bio</td>
		                                    	<td class="aboutUsuario"></td>
		                                    </tr>
		                            	</tbody>
		                            </table>
		                        </div>
	                        </div>
	                    </div>
	                    <div class="panel-footer">
	                        <button class="btn btn-sm btn-primary" type="button" data-toggle="tooltip" data-original-title="Send message to user"><i class="glyphicon glyphicon-envelope"></i></button>
	                        <span class="pull-right">
                            <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modalEditar" rel="tooltip" data-original-title="Editar usuario" data-id="{{ $user->id }}"><i class="glyphicon glyphicon-edit"></i></button>
                            <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#modalEliminar" rel="tooltip" data-original-title="Elminar usuario" data-id="{{ $user->id }}"><i class="glyphicon glyphicon-remove"></i></button>
	                        </span>
	                    </div>
	                </div>
	            </td>
			</tr>
			@endforeach
		</tbody>
	</table>


	<div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
					<h4 class="modal-title" id="myModalLabel">Crear usuario</h4>
				</div>
				<div class="modal-body">					
					@include('users.create')		
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button id="guardarUsuario" type="button" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
					<h4 class="modal-title" id="myModalLabel">Eliminar usuario</h4>
				</div>
				<div class="modal-body">
					<button id="eliminarUsuario" type="button" class="btn btn-danger btn-lg">Confirmar eliminar usuario</button>		    
				</div>				
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
					<h4 class="modal-title" id="myModalLabel">Editar usuario</h4>
				</div>
				<div class="modal-body">					
					@include('users.update')		
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button id="actualizarUsuario" type="button" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>
@stop

