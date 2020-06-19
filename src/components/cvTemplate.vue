<template>
  <div class="container-fluid">
    <div class="row">
      <!-- The Form Input fields -->

      <div class="col-lg-3 col-md-3 col-12 cv-form">
        <form method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Name">Name</label>
              <input
                type="text"
                class="form-control"
                id="Name"
                placeholder="Name"
                v-model.lazy="name"
              />
            </div>
            <div class="form-group col-md-6">
              <label for="posteTitle">Poste Title</label>
              <input
                type="text"
                class="form-control"
                id="posteTitle"
                placeholder="poste Title"
                v-model.lazy="PosteTitle"
              />
            </div>
          </div>
          <div class="form-group" v-for="(contact, index) in contactList" :key="index">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="contactName">Contact Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="contactName"
                  placeholder="contactName"
                  v-model="contact.contactName"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="ContactValue">Contact Value</label>
                <input
                  type="text"
                  class="form-control"
                  id="ContactValue"
                  placeholder="ContactValue"
                  v-model="contact.value"
                />
              </div>
            </div>
          </div>
          <button class="btn btn-success" @click.prevent="addContact">Add Contact</button>
          <div class="form-group" v-for="(personal,index) in personality" :key="index">
            <label for="personality">personality</label>
            <input
              type="text"
              class="form-control mb-2"
              id="personality"
              placeholder="describe yourself"
              v-model="personal.personalDiscription"
            />
          </div>
          <button class="btn btn-success" @click.prevent="addPersonality">Add Personality</button>
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
              <input
                type="text"
                class="form-control"
                id="skill"
                v-model="skills"
              />
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
              rows="5"
              v-model="CoverLetter"
            ></textarea>
          </div>
          <div class="form-group">
            <label for="Personal">Personal Description</label>
            <textarea
              class="form-control"
              id="Personal"
              rows="5"
              v-model="Personal"
            ></textarea>
          </div>
          <button type="submit" class="btn btn-primary text-light" @click.prevent="addCv()">
            Submit
          </button>
        </form>
        <button class="btn btn-outline-success mt-5" @click="exportPDF">
          <i class="fas fa-file-pdf mr-2"></i>
          <span>Download book as PDF</span>
        </button>
      </div>

      <!-- The Curriculum output -->

      <div class="col-lg-9 col-md-9 col-12 px-5">
        <div class="row" ref="content">
          <div class="col-lg-4 col-md-4 col-12 p-0 left-side">
            <div class="avatar">
              <picture-input
                ref="pictureInput"
                accept="image/jpeg,image/png"
                size="10"
                :hideChangeButton="true"
                :removable="false"
                :customStrings="{
                  upload: '<h1>Bummer!</h1>',
                  drag: 'Drag an image or click here to select one',
                  aspect: 'Landscape/Portrait',
                }"
              >
              </picture-input>
            </div>
            <div class="px-4 my-3">
              <section>
                <div class="contact">
                  <div class="row section-title align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                      <h2 class="text-uppercase">Contact</h2>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                      <hr />
                    </div>
                  </div>
                  <div class="d-flex flex-column" v-for="(contact, index) in contactList" :key="index">
                    <div class="d-flex align-items-baseline">
                      <span class="text-capitilaze mr-3">{{
                        contact.contactName
                      }}</span>
                      <a :href="contact.value" class="mb-0">{{ contact.value }}</a>
                    </div>
                  </div>
                </div>
              </section>
              <section>
                <div
                  class="d-flex flex-column justify-content-between personality"
                >
                  <div class="row section-title align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                      <h2 class="text-uppercase">personality</h2>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                      <hr />
                    </div>
                  </div>
                  <ul v-for="(personal, i) in personality" :key="i">
                    <li> {{ personal.personalDiscription }} </li>
                  </ul>
                </div>
              </section>
              <section>
                <div
                  class="d-flex flex-column justify-content-between personality"
                >
                  <div class="row section-title align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                      <h2 class="text-uppercase">Languages</h2>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                      <hr />
                    </div>
                  </div>
                  <ul>
                    <li class="row language align-items-center">
                      <div class="col-lg-4 col-md-4 col-6">
                        <span>Arabic</span>
                      </div>
                      <div class="col-lg-8 col-md-8 col-6">
                        <label class="level mb-0" style="width: 100%"></label>
                      </div>
                    </li>
                    <li class="row language align-items-center">
                      <div class="col-lg-4 col-md-4 col-6">
                        <span>French</span>
                      </div>
                      <div class="col-lg-8 col-md-8 col-6">
                        <label class="level mb-0" style="width: 50%"></label>
                      </div>
                    </li>
                    <li class="row language align-items-center">
                      <div class="col-lg-4 col-md-4 col-6">
                        <span>English</span>
                      </div>
                      <div class="col-lg-8 col-md-8 col-6">
                        <label class="level mb-0" style="width: 70%"></label>
                      </div>
                    </li>
                    <li class="row language align-items-center">
                      <div class="col-lg-4 col-md-4 col-6">
                        <span>German</span>
                      </div>
                      <div class="col-lg-8 col-md-8 col-6">
                        <label class="level mb-0" style="width: 20%"></label>
                      </div>
                    </li>
                  </ul>
                </div>
              </section>
            </div>
          </div>

          <div class="col-lg-8 col-md-8 col-12 bg-gray pt-5 right-side">
            <section>
              <div class="text-center text-uppercase ">
                <div class="row align-items-center">
                  <div class="col-lg-5 col-md-5 col-12"></div>
                  <div class="col-lg-7 col-md-7 col-12">
                    <hr />
                  </div>
                </div>
                <div class="cv-header">
                  <h1 class="text-uppercase">{{ name }}</h1>
                  <small class="text-uppercase">{{ PosteTitle }}</small>
                </div>
              </div>
            </section>
            <div class="cv-body container">
              <section>
                <div class="row section-title align-items-center">
                  <div class="col-lg-5 col-md-5 col-12">
                    <h2 class="text-uppercase">Cover Letter</h2>
                  </div>
                  <div class="col-lg-7 col-md-7 col-12">
                    <hr />
                  </div>
                </div>
                <div class="row px-3 align-items-baseline w-100">
                  <div class="d-flex flex-column justify-content-end ">
                    <p>
                      {{ CoverLetter }}
                    </p>
                    <div class="d-flex flex-column align-items-end">
                      <h4>Applicant Name</h4>
                      <small>12 November 2020</small>
                    </div>
                  </div>
                </div>
              </section>
              <section>
                <div class="row section-title align-items-center">
                  <div class="col-lg-5 col-md-5 col-12">
                    <h2 class="text-uppercase">personal</h2>
                  </div>
                  <div class="col-lg-7 col-md-7 col-12">
                    <hr />
                  </div>
                </div>
                <div class="row px-3 align-items-baseline">
                  <div class="d-flex flex-column justify-content-end">
                    <p>{{ Personal }}</p>
                  </div>
                </div>
              </section>
              <section>
                <div class="row section-title align-items-center">
                  <div class="col-lg-5 col-md-5 col-12">
                    <h2 class="text-uppercase">education</h2>
                  </div>
                  <div class="col-lg-7 col-md-7 col-12">
                    <hr />
                  </div>
                </div>
                <div class="row px-3 align-items-baseline">
                  <div class="col-lg-3 col-md-3 col-12">
                    <span class="date">2011-2012</span>
                  </div>
                  <div class="col-lg-9 col-md-9 col-12">
                    <h3>Lorem Ipsum</h3>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Repudiandae voluptas aspernatur molestiae quasi eius
                      nesciunt maxime sunt, qui, eos enim magnam itaque
                      reiciendis! Dignissimos autem, totam error maiores
                      recusandae provident.
                    </p>
                  </div>
                </div>
                <div class="row px-3 align-items-baseline">
                  <div class="col-lg-3 col-md-3 col-12">
                    <span class="date">2012-2014</span>
                  </div>
                  <div class="col-lg-9 col-md-9 col-12">
                    <h3>Lorem Ipsum</h3>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Repudiandae voluptas aspernatur molestiae quasi eius
                      nesciunt maxime sunt, qui, eos enim magnam itaque
                      reiciendis! Dignissimos autem, totam error maiores
                      recusandae provident.
                    </p>
                  </div>
                </div>
                <div class="row px-3 align-items-baseline">
                  <div class="col-lg-3 col-md-3 col-12">
                    <span class="date">2014-2016</span>
                  </div>
                  <div class="col-lg-9 col-md-9 col-12">
                    <h3>Lorem Ipsum</h3>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Repudiandae voluptas aspernatur molestiae quasi eius
                      nesciunt maxime sunt, qui, eos enim magnam itaque
                      reiciendis! Dignissimos autem, totam error maiores
                      recusandae provident.
                    </p>
                  </div>
                </div>
              </section>
              <section>
                <div class="row section-title align-items-center">
                  <div class="col-lg-5 col-md-5 col-12">
                    <h2 class="text-uppercase">experience</h2>
                  </div>
                  <div class="col-lg-7 col-md-7 col-12">
                    <hr />
                  </div>
                </div>
                <div class="row px-3 align-items-baseline">
                  <div class="col-lg-3 col-md-3 col-12">
                    <span class="date">2011-2012</span>
                  </div>
                  <div class="col-lg-9 col-md-9 col-12">
                    <h3>Workname</h3>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Repudiandae voluptas aspernatur molestiae quasi eius
                      nesciunt maxime sunt, qui, eos enim magnam itaque
                      reiciendis! Dignissimos autem, totam error maiores
                      recusandae provident.
                    </p>
                  </div>
                </div>
                <div class="row px-3 align-items-baseline">
                  <div class="col-lg-3 col-md-3 col-12">
                    <span class="date">2012-2014</span>
                  </div>
                  <div class="col-lg-9 col-md-9 col-12">
                    <h3>Workname</h3>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Repudiandae voluptas aspernatur molestiae quasi eius
                      nesciunt maxime sunt, qui, eos enim magnam itaque
                      reiciendis! Dignissimos autem, totam error maiores
                      recusandae provident.
                    </p>
                  </div>
                </div>
                <div class="row px-3 align-items-baseline">
                  <div class="col-lg-3 col-md-3 col-12">
                    <span class="date">2014-2016</span>
                  </div>
                  <div class="col-lg-9 col-md-9 col-12">
                    <h3>Workname</h3>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Repudiandae voluptas aspernatur molestiae quasi eius
                      nesciunt maxime sunt, qui, eos enim magnam itaque
                      reiciendis! Dignissimos autem, totam error maiores
                      recusandae provident.
                    </p>
                  </div>
                </div>
              </section>
              <section>
                <div class="row section-title align-items-center">
                  <div class="col-lg-5 col-md-5 col-12">
                    <h2 class="text-uppercase">skills</h2>
                  </div>
                  <div class="col-lg-7 col-md-7 col-12">
                    <hr />
                  </div>
                </div>
                <div class="d-flex justify-content-around flex-wrap">
                  <vue-circle
                    :progress="90"
                    :size="130"
                    :reverse="false"
                    line-cap="round"
                    :fill="fill"
                    empty-fill="rgba(0, 0, 0, .3)"
                    :animation-start-value="0.0"
                    :start-angle="0"
                    insert-mode="append"
                    :thickness="12"
                    :show-percent="false"
                    @vue-circle-progress="progress"
                    @vue-circle-end="progress_end"
                  >
                    <span>AI</span>
                    <small>Adobe Illustrator</small>
                  </vue-circle>
                  <vue-circle
                    :progress="50"
                    :size="130"
                    :reverse="false"
                    line-cap="round"
                    :fill="fill"
                    empty-fill="rgba(0, 0, 0, .3)"
                    :animation-start-value="0.0"
                    :start-angle="0"
                    insert-mode="append"
                    :thickness="12"
                    :show-percent="false"
                    @vue-circle-progress="progress"
                    @vue-circle-end="progress_end"
                  >
                    <span>PSD</span>
                    <small>Adobe Photoshop</small>
                  </vue-circle>
                  <vue-circle
                    :progress="65"
                    :size="130"
                    :reverse="false"
                    line-cap="round"
                    :fill="fill"
                    empty-fill="rgba(0, 0, 0, .3)"
                    :animation-start-value="0.0"
                    :start-angle="0"
                    insert-mode="append"
                    :thickness="12"
                    :show-percent="false"
                    @vue-circle-progress="progress"
                    @vue-circle-end="progress_end"
                  >
                    <span>AE</span>
                    <small>Adobe after effect</small>
                  </vue-circle>
                  <vue-circle
                    :progress="80"
                    :size="130"
                    :reverse="false"
                    line-cap="round"
                    :fill="fill"
                    empty-fill="rgba(0, 0, 0, .3)"
                    :animation-start-value="0.0"
                    :start-angle="0"
                    insert-mode="append"
                    :thickness="12"
                    :show-percent="false"
                    @vue-circle-progress="progress"
                    @vue-circle-end="progress_end"
                  >
                    <span>ID</span>
                    <small>Adobe InDesign</small>
                  </vue-circle>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
/* eslint-disable */
import axios from "axios";
import VueCircle from "vue2-circle-progress";
import PictureInput from "vue-picture-input";
import jsPDF from "jspdf";
import DomToImage from "dom-to-image";
export default {
  components: {
    VueCircle,
    PictureInput,
  },
  data() {
    return {
      date: "",
      name: "Applicant Name",
      PosteTitle: "Post Title",
      CoverLetter: "",
      Personal: "",
      contactList: [
        {
          contactName: "",
          value: "",
        },
      ],
      personality: [
        {
          personalDiscription: "",
        },
      ],
      Education: [
        {
          startDate: "",
          endDate: "",
          establishement: "",
          diploma: "",
        },
      ],
      Experience: [
        {
          startDate: "",
          endDate: "",
          company: "",
          posteTitle: "",
          tasks: [],
        },
      ],
      skills: [
        {
          skillName: "",
          skillShortName: "",
          level: "",
        },
      ],
      languages: [
        {
          languageName: "",
          level: "",
        },
      ],
      newCV: {
        applicant_name: "",
        applicant_job_title: ""
      },
      // currentCV: {},
      fill: { color: "#000" },
    };
  },
  mounted: function() {
    this.addCv();
  },
  methods: {
    // getCV() {
    //   axios
    //     .get("http://localhost/cv-vue/src/backend/api.php?action=read")
    //     .then((res) => {
    //       if (res.data.error) {
    //         this.errorMsg = res.data.message;
    //       } else {
    //         console.log(res.data);
    //       }
    //     });
    // },
    progress(progress, stepValue) {},
    progress_end() {},
    onChange() {
      console.log("New picture selected!");
      if (this.$refs.pictureInput.image) {
        console.log("Picture loaded.");
      } else {
        console.log("FileReader API not supported: use the <form>, Luke!");
      }
    },
    exportPDF() {
      DomToImage.toPng(this.$refs.content)
        .then(function(dataUrl) {
          var img = new Image();
          img.src = dataUrl;
          const doc = new jsPDF("p", "mm", "a4");
          var width = doc.internal.pageSize.getWidth();
          var height = doc.internal.pageSize.getHeight();
          doc.addImage(img, "PNG", 0, 0, width, height);
          doc.save("book.pdf");
        })
        .catch(function(error) {
          console.error("something went wrong!", error);
        });
    },
    addCv(){
      const formData = this.toFormData(this.newCV);
      axios.post("http://localhost/cv-vue/src/backend/api.php?action=create", formData).then(res => {
        this.newCV = { applicant_name: "", applicant_job_title:""};
        if (res.data.error) {
          this.errorMsg = res.data.message;
        } else {
          this.successMsg = res.data.message;
        }
      });
    },
    addContact: function(){
      this.contactList.push({
        contactName: '',
        value: ''
      })
    },
    addPersonality: function(){
      this.personality.push({
       personalDiscription: ''
      })
    },
    toFormData(obj) {
      const fd = new FormData();
      for (const i in obj) {
        fd.append(i, obj[i]);
      }
      return fd;
    }
  },
  computed: {
    convertToString(){
      var str = getElementById('personality').value;
      this.personality = str.split('');
    }
  }
};
</script>

<style lang="scss" scoped>
.cv-form {
  background-color: #0d324c;
  label {
    color: #fff;
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    font-size: 18px;
  }
}
.picture-input .btn:not(:disabled):not(.disabled) {
  cursor: pointer;
  display: none !important;
}
.cv-header {
  h1 {
    color: #d72626;
    font-size: 48px;
  }
  small {
    color: #a2a2a2;
    font-size: 32px;
  }
}
section {
  margin-bottom: 24px;
  .section-title {
    margin-bottom: 20px;
  }
}

hr {
  width: 150px;
  height: 2.5px;
  margin: 1rem 0px;
  background-color: #d72626;
}
.avatar {
  background-color: #fff;
}
.language {
  .level {
    border: 2px solid #d72626;
    height: 20px;
  }
}
h2 {
  color: #d72626;
  font-weight: 700;
  font-size: 24px;
}
ul {
  padding-left: 0;
  li {
    list-style: none;
    color: #a2a2a2;
    font-size: 16px;
    text-transform: capitalize;
  }
}
.left-side {
  background-color: #131313;
  color: #a2a2a2;
  span {
    font-size: 16px;
  }
  hr {
    width: 75%;
    height: 2.5px;
    margin: 1rem 0px;
    background-color: #d72626;
  }
}
img {
  width: 100%;
  height: 400px;
}
.right-side {
  border-right: 8px solid #d72626;
}

span.date {
  font-size: 18px;
  font-weight: 700;
  color: #000;
}

h3 {
  color: #d72626;
}

.circle-percent-text-body {
  text-align: center;
  padding: 14px 0px;
  span {
    font-size: 21px;
    font-weight: 700;
  }
  small {
    font-size: 10px;
  }
}

.contact {
  label {
    word-break: break-word;
  }
}

@media screen and (max-width: 767px) {
  hr {
    width: 100%;
  }
  .cv-header h1 {
    font-size: 32px;
  }
  .cv-header small {
    font-size: 24px;
  }
  h2 {
    font-size: 20px;
  }
}
</style>
