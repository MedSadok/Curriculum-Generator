<template>
  <form method="post">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="Name">Name</label>
        <input
          type="text"
          class="form-control"
          id="Name"
          placeholder="Name"
          v-model="name"
        />
      </div>
      <div class="form-group col-md-6">
        <label for="posteTitle">Poste Title</label>
        <input
          type="text"
          class="form-control"
          id="posteTitle"
          placeholder="poste Title"
          v-model="PosteTitle"
        />
      </div>
    </div>
    <div class="form-group">
      <label for="Contact">Contact</label>
      <input
        type="text"
        class="form-control"
        id="contact"
        placeholder="Add your email, website"
        v-model="contactList"
      />
    </div>
    <div class="form-group">
      <label for="personality">personality</label>
      <input
        type="text"
        class="form-control"
        id="personality"
        placeholder="describe yourself"
        v-model="personality"
      />
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="language">language</label>
        <input
          type="text"
          class="form-control"
          id="Language"
          v-model="languages"
        />
      </div>
      <div class="form-group col-md-4">
        <label for="languageLevel">Level</label>
        <select id="languageLevel" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="skill">skill</label>
        <input type="text" class="form-control" id="skill" v-model="skills" />
      </div>
      <div class="form-group col-md-4">
        <label for="skillLevel">Level</label>
        <select id="skillLevel" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="CoverLetter">Cover Letter</label>
      <textarea
        class="form-control"
        id="CoverLetter"
        v-model="CoverLetter"
      ></textarea>
    </div>
    <div class="form-group">
      <label for="Personal">Personal Description</label>
      <textarea
        class="form-control"
        id="Personal"
        v-model="Personal"
      ></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</template>


<script>
export default {
    
}
</script>
<style scoped>
  label{
    color: #fff;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: 18px;
  }
</style>