<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Account Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                 <form role="form" @submit.prevent="Updateaccounrrole">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Permission *</label>
                     <input  v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" id="name" placeholder="Role Name ">
                        <has-error :form="form" field="name"></has-error>
                  </div>
                       <div class="form-group">
                    <label for="name">Role Name * </label>
                    <br>
                    <span v-for="value in permission" :key="value.id">
                      
                      <input v-model="form.permission" type="checkbox" :value="value.id" :id="value.id"> 
                    <label :for="value.id">{{value.name}}</label> &nbsp;
                    
                   </span>
                  
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/superadmin/accountrolelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditAccounttype',
    data() {
    return {
      form: new Form({
        name:"",
        permission:[],
      }),
      permission:null,
      rolepermissioninfo:{}
    };
  },
         created () {
            document.title = "Edit Account Type";
        },
      mounted(){
          axios.get(`/superadmin/editaccountrole/${this.$route.params.id}`)
          .then((response)=>{
              this.form.name=(response.data.editroleinfo.name);
              this.permission=response.data.permission;
              this.rolepermissioninfo=response.data.rolepermissioninfo;
              console.log(response.data.rolepermissioninfo);
          })
      },
    
    methods: {
      Updateaccounrrole(){
        this.form.put('/superadmin/updateaccountrole/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Account Role Update Successfull')],[this.$router.push('/superadmin/accountrolelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>