<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Body Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateBodytype">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="bodytype">Body Type</label>
                     <input  v-model="form.bodytype" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('bodytype') }" id="bodytype" placeholder="Body Type Name">
                        <has-error :form="form" field="bodytype"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/bodytypelist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'updatebodytype',
       created () {
            document.title = "Edit Bodytype";
        },
      mounted(){
          axios.get(`/admin/editbodytype/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.bodytype)
          })
      },
        data(){
        return {
          form: new Form({
            bodytype:'',
          })
          
        }
    },
    
    
    methods: {
      updateBodytype(){
        this.form.patch('/admin/updatebodytype/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('BodytypeUpdate Successfull')],[this.$router.push('/admin/bodytypelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>