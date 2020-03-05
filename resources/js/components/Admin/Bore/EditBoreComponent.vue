<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Bore</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateBore">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bore">Bore</label>
                     <input  v-model="form.bore" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bore') }" id="bore" placeholder="Bore Name">
                        <has-error :form="form" field="bore"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/borelist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditBore',
       created () {
            document.title = "Edit Bore";
        },
      mounted(){
          axios.get(`/admin/editbore/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.bore)
          })
      },
        data(){
        return {
          form: new Form({
            bore:'',
          })
          
        }
    },
    
    
    methods: {
      updateBore(){
        this.form.patch('/admin/updatebore/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Category Update Successfull')],[this.$router.push('/admin/borelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>