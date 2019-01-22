<template>
  <div>
    <h2 class = "text-center">Table of Users</h2>
    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
    Create
    </button>
<button class="btn btn-primary btn-block" @click="getPlaceholder('http://jsonplaceholder.typicode.com/users/')">Import</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Create/Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form @submit.prevent="addUser" class="mb-3">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="First name" v-model="user.name">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Last name" v-model="user.lname">
      </div>
          <div class="form-group">
        <input type="text" class="form-control" placeholder="Email" v-model="user.email">
      </div>
          <div class="form-group">
        <input type="text" class="form-control" placeholder="Address" v-model="user.address">
      </div>
      <button type="submit" class="btn btn-light btn-block">Save</button>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


     <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <tr>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Email</th>
           <th>Address</th>
           <th>Edit</th>
           <th>Address</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" v-bind:key="user.id">
            <td>{{user.name}}</td>
            <td>{{user.lname}}</td>
            <td>{{user.email}}</td>
            <td>{{user.address}}</td>
            <button @click="editUser(user)" class="btn btn-warning mb-2" data-toggle="modal" data-target="#exampleModal">Edit</button>
            <td><button @click="deleteUser(user.id)" class="btn btn-danger">Delete </button></td>
          </tr>
          <nav>
          </nav>
        </tbody>
     </table>
  </div>  
</template>

<script>

export default {
  data(){
    return{
      users: [],
      user: {
        id: '',
        name: '',
        lname: '',
        email: '',
        address: ''
      },
      user_id: '',
      pagination: {},
      edit: false
    };
  },
  created() {
    this.fetchUsers();
  },
  methods: {
    fetchUsers(page_url) {
      let vm = this;
      page_url = page_url || '/api/users'
      fetch(page_url)
      .then(response => response.json())
      .then(response => {
        this.users = response.data;
      })
      
    },
    /* TO DO NEXT PREV LINKS
    makePagination(meta, links)
    {
        let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
    }
    */
 

  
    deleteUser(id) {
      console.log(id);
    if(confirm('Are You Sure?')){
      fetch('/api/user/'+ id, {
        method: 'delete'
      })
      .then(data => {
        alert("User Deleted");
        this.fetchUsers()
      })
      }
  },

  addUser()
  {
    if(this.edit === false)//adding
    {
      fetch('/api/users',{
        method: 'post',
        body: JSON.stringify(this.user),
        headers: {
          'content-type': 'application/json'
        }
      })
        alert('User Added');
        this.clearForm();
        this.fetchUsers();
        $('#exampleModal').modal('hide');
      
    }
    else //updating
{
        // Update
        fetch('api/user', {
          method: 'put',
          body: JSON.stringify(this.user),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('User Updated');
          })
          this.fetchUsers();
          $('#exampleModal').modal('hide');
        
      }
  },
  editUser(user) {
      this.edit = true;
      this.user.id = user.id;
      this.user.user_id = user.id;
      this.user.name = user.name;
      this.user.lname = user.lname;
      this.user.email = user.email;
      this.user.address = user.address;
    },
    clearForm() {
      this.edit = false;
      this.user.id = null;
      this.user.user = null;
      this.user.title = '';
      this.user.body = '';
    },
    getPlaceholder(url){
      var c = Math.floor(Math.random() * 10) + 1;
      jQuery.when(
      jQuery.getJSON(url + c))
      .done( function(json) {
      console.log(json);
  var Imported = 
      {
          'name': json.name,
          'lname': json.username,
          'email': json.email,
          'address': json.address.city,
      }     
            fetch('/api/users',{
        method: 'post',
        body: JSON.stringify(Imported),
        headers: {
          'content-type': 'application/json'
        }
      })
});
        alert('User Added');
        this.fetchUsers('api/users');
    }
  }
}
  




</script>
