<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-center"> <label class="col-sm-4 col-form-label">Lista de Usuarios</label> </h3>

                <div class="card-tools">
                   <button class="btn btn-success" @click="newModal"> Nuevo Usuario <i class="fas fa-user-plus fa-fw"></i> 
                   </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-bordered table-striped">
                  <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Entidad</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Cédula</th>
                    <th>R.U.</th>
                    <th>Creación</th>
                    <th>Opciones</th>
                  </tr>
                </thead>                
                <tbody>
                  <tr v-for="user in users" :key="user.id">
                    <td v-text="user.id"></td>
                    <td v-text="user.entity"></td>
                    <td v-text="user.name"></td>
                    <td v-text="user.email"></td>
                    <td v-text="user.phone"></td>
                    <td v-text="user.cedula"></td>
                    <td v-text="user.ru"></td>
                    <td>{{ user.created_at | myDate }}</td>
                    <td class="text-center"> 
                        <a href="#" @click="editModal(user)">  
                            <i class="fa fa-edit blue"></i> </a> /
                        <a href="#" @click="deleteUser(user.id)">  
                            <i class="fa fa-trash red"></i> 
                        </a>
                    </td>
                  </tr>  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card  @submit.prevent="createUser"-->
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"> 
              <div class="modal-header">
                   <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Nuevo Usuario</h5> 
                   <h5 class="modal-title" v-show="editmode" id="addNewLabel">Actualizar información del usuario </h5> 
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div> 
            <form @submit.prevent="editmode ? updateUser() : createUser()" class="bg-light">  
              <div class="modal-body">
                  <div class="form-group row">
                      <label for="name" class="col-sm-4 col-form-label">Nombre Completo:</label>
                      <div class="col-sm-8">
                          <input v-model="form.name" type="text" name="name"
                            placeholder="Ejm. Ing. Jorge Peralta" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                          <has-error :form="form" field="name"></has-error>
                      </div>
                  </div> 
                  <div class="form-group row">
                      <label for="entity" class="col-sm-4 col-form-label">Entidad:</label>
                      <div class="col-sm-8">
                          <input v-model="form.entity" type="text" name="entity"
                            placeholder="Ejm. Depto. de Infraestructura" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('entity') }">
                          <has-error :form="form" field="entity"></has-error>
                      </div>
                  </div> 
                  <div class="form-group row">
                      <label for="email" class="col-sm-4 col-form-label">Email:</label>
                      <div class="col-sm-8">
                          <input v-model="form.email" type="text" name="email"
                            placeholder="Ejm. peralta.uatf@gmail.com" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                          <has-error :form="form" field="email"></has-error>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="cedula" class="col-sm-2 col-form-label">Cédula:</label>
                      <div class="col-sm-4">
                          <input v-model="form.cedula" type="text" name="cedula"
                            placeholder="Ejm. 85845372" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('cedula') }">
                          <has-error :form="form" field="cedula"></has-error>
                      </div>

                      <label for="phone" class="col-sm-2 col-form-label">Teléfono:</label>
                      <div class="col-sm-4">
                          <input v-model="form.phone" type="text" name="phone"
                            placeholder="Ejm. 75729198" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                          <has-error :form="form" field="phone"></has-error>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="ru" class="col-sm-2 col-form-label">R.U.:</label>
                      <div class="col-sm-4">
                          <input v-model="form.ru" type="number" name="ru"
                            placeholder="Ejm. 65238" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('ru') }">
                          <has-error :form="form" field="ru"></has-error>
                      </div>
                    <label for="saldo" class="col-sm-2 col-form-label">Saldo:</label>
                      <div class="col-sm-4">
                          <input v-model="form.saldo" type="number" name="saldo"
                            placeholder="Ejm. 20" 
                            class="form-control" :class="{ 'is-invalid': form.errors.has('saldo') }">
                          <has-error :form="form" field="saldo"></has-error>
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="phone" class="col-sm-4 col-form-label">Tipo de Usuario:</label>
                      <div class="col-sm-8">
                        <select name="type" v-model="form.type" id="type" class="form-control" :class="{'is-invalid': form.errors.has('type')}">
                          <option value="">Tipo de usuario</option>
                          <option value="jefatura">Jefatura</option>
                          <option value="supervi">Supervisor</option>
                          <option value="cajero">Cajero</option>
                          <option value="conductor">Conductor</option>
                          <option value="student">Estudiante</option> 
                        </select>
                        <has-error :form="form" field="type"></has-error>
                      </div>
                  </div>
              </div>
              <div class="modal-footer" align="center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button v-show="editmode" type="submit" class="btn btn-primary">Actualizar</button>
                <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
              </div>
            </form>  
            </div>
          </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
          return{
              editmode: false,
              users: {},
              form: new Form({
                  id : '',
                  entity : '',
                  name : '',
                  cedula: '',
                  phone: '',
                  ru: '',
                  email: '',
                  password: '',
                  type: '',
                  avatar:''
              })
          }
        },
        methods:{
            updateUser(){
              this.$Progress.start();
                //console.log('Actualizando datos');
                this.form.put('api/user/'+this.form.id)
                .then(() => {
                  $('#addNew').modal('hide');
                    swal(
                          'Actualizado!',
                          'Su información fue actualizada.',
                          'success'
                        )
                    Fire.$emit('AfterCreate')
                  this.$Progress.finish();
                })
                .catch(()=>{
                  this.$Progress.fail();
                });
            },
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteUser(id){
                swal({
                  title: '¿Estás seguro?',
                  text: "¡No podrás revertir esto!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: '¡Sí, bórralo!'
                }).then((result) => {
                  if (result.value) {
                  //Aqui envio la solicitud al servidor
                      this.form.delete('api/user/'+id).then(()=>{
                        //recien envio en mensaje de respuesta
                            swal(
                              'Eliminado!',
                              'Su registro ha sido eliminado.',
                              'success'
                            ) 
                          Fire.$emit('AfterCreate')
                      }).catch(()=>{
                          swal("Ha fallado!", "Había algo raro.", "warning");
                      });
                  }
                })
            },
            loadUsers(){
              axios.get("api/user").then(({ data })=>(this.users = data.data ));
            },
            createUser(){
              this.$Progress.start();
              this.form.post('api/user')

              .then(()=>{
              Fire.$emit('AfterCreate');

              $('#addNew').modal('hide')
              
              toast({
                type: 'success',
                title: 'Registro exitoso'
              })
              this.form.reset();
              this.$Progress.finish();
              })
             .catch(()=>{

              })

            }
        },
        created() {
            this.loadUsers();
            Fire.$on('AfterCreate',() => {
                this.loadUsers();
            });
        }
    }
</script>
