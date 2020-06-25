<template>
  <div class="container-fluid">
    <div class="row">
      <!-- The Form Input fields -->
      <div class="col-lg-3 col-md-3 col-12 cv-form">
        <h1 class="text-uppercase">Enter your data here:</h1>
        <form method="post">
          <div class="form-row" v-for="(app, a) in applicant" :key="a">
            <div class="form-group col-md-6">
              <label for="Name">Name</label>
              <input
                type="text"
                class="form-control"
                id="Name"
                placeholder="Name"
                v-model="app.name"
              />
            </div>
            <div class="form-group col-md-6">
              <label for="posteTitle">Poste Title</label>
              <input
                type="text"
                class="form-control"
                id="posteTitle"
                placeholder="poste Title"
                v-model="app.PosteTitle"
              />
            </div>
          </div>
          <div class="form-group">
            <div class="form-row" v-for="(contact, c) in contactList" :key="c">
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
          <button class="btn btn-success" @click.prevent="addContact">
            Add Contact
          </button>
          <div class="form-group">
            <label for="personality">personality</label>
            <input
              v-for="(personal, i) in personality"
              :key="i"
              type="text"
              class="form-control mb-2"
              id="personality"
              placeholder="describe yourself"
              v-model="personal.personalDiscription"
            />
          </div>
          <button class="btn btn-success" @click.prevent="addPersonality">
            Add Personality
          </button>
          <div class="form-group">
            <div class="form-row" v-for="(language, l) in languages" :key="l">
              <div class="form-group col-md-7">
                <label for="language">language</label>
                <input
                  type="text"
                  class="form-control"
                  id="Language"
                  placeholder="Language"
                  v-model="language.languageName"
                />
              </div>
              <div class="form-group col-md-5">
                <label for="languageLevel">Level</label>
                <input
                  type="text"
                  pattern="\d*"
                  minlength="2"
                  maxlength="3"
                  class="form-control"
                  id="LanguageLevel"
                  placeholder="Language Level"
                  v-model="language.level"
                />
              </div>
            </div>
          </div>
          <button class="btn btn-success" @click.prevent="addLanguage">
            Add Language
          </button>
          <div class="form-group">
            <div class="form-row" v-for="(skill, s) in skills" :key="s">
              <div class="form-group col-md-7">
                <label for="skill">skill</label>
                <input
                  type="text"
                  class="form-control"
                  id="skill"
                  placeholder="Skill"
                  v-model="skill.skillName"
                />
              </div>
              <div class="form-group col-md-5">
                <label for="languageLevel">Level</label>
                <input
                  type="text"
                  pattern="\d*"
                  minlength="2"
                  maxlength="3"
                  class="form-control"
                  id="skillLevel"
                  placeholder="Skill Level"
                  v-model.number="skill.level"
                />
              </div>
            </div>
          </div>
          <button class="btn btn-success" @click.prevent="addSkill">
            Add Skill
          </button>
          <div class="form-group">
            <div class="form-row" v-for="(edu, e) in Education" :key="e">
              <div class="form-group col-md-6">
                <label for="startDate">start date</label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="Start Year"
                  name="startdate"
                  v-model="edu.startDate"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="endDare">End Date</label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="End Year"
                  v-model="edu.endDate"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="Establishement">Establishement</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Establishement"
                  v-model="edu.establishement"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="diploma">Diploma</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Diploma"
                  v-model="edu.diploma"
                />
              </div>
            </div>
          </div>
          <button class="btn btn-success" @click.prevent="addEducation">
            Add Education
          </button>
          <div class="form-group">
            <div class="form-row" v-for="(exp, ex) in Experience" :key="ex">
              <div class="form-group col-md-6">
                <label for="startDate">start date</label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="Start Year"
                  name="startdate"
                  v-model="exp.startDate"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="endDare">End Date</label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="End Year"
                  v-model="exp.endDate"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="Name">Company</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Company"
                  v-model="exp.company"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="posteTitle">Poste Title</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Poste Title"
                  v-model="exp.posteTitle"
                />
              </div>
              <div class="form-group col-md-12">
                <label for="Tasks">Tasks</label>
                <textarea
                  class="form-control"
                  id="Tasks"
                  rows="5"
                  v-model="exp.tasks"
                ></textarea>
              </div>
            </div>
          </div>
          <button class="btn btn-success" @click.prevent="addExperience">
            Add Experience
          </button>
          <div class="form-group">
            <label for="CoverLetter">Cover Letter</label>
            <textarea
              class="form-control text"
              id="CoverLetter"
              rows="5"
              v-model="CoverLetter"
            ></textarea>
          </div>
          <div class="form-group">
            <label for="Personal">Personal Description</label>
            <textarea
              class="form-control text"
              id="Personal"
              rows="5"
              v-model="Personal"
            ></textarea>
          </div>
          <!-- <button type="submit" class="btn btn-primary text-light" @click.prevent="addCv()">
            Submit
          </button>-->
        </form>
        <button class="btn btn-outline-success mt-2" @click="exportPDF">
          <i class="fas fa-file-pdf mr-2"></i>
          <span>Download book as PDF</span>
        </button>
      </div>

      <!-- The Curriculum output -->

      <div class="col-lg-9 col-md-9 col-12 px-5 py-3">
        <div class="row" ref="content">
          <div class="col-lg-4 col-md-4 col-12 p-0 left-side">
            <div class="avatar">
              <picture-input
                ref="pictureInput"
                accept="image/jpeg, image/png"
                size="10"
                :hideChangeButton="true"
                :removable="false"
                :customStrings="{
                  upload: '<h1>Bummer!</h1>',
                  drag: 'Drag an image or click here to select one',
                  aspect: 'Landscape/Portrait',
                }"
              ></picture-input>
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
                  <div
                    class="d-flex flex-column"
                    v-if="
                      contactList[0].contactName.length == 0 &&
                        contactList[0].value.length == 0
                    "
                  >
                    <div class="d-flex align-items-baseline">
                      <span class="text-capitilaze mr-3">Skype:</span>
                      <a class="mb-0">gonor201075</a>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <span class="text-capitilaze mr-3">Phone:</span>
                      <a class="mb-0">+45 698 095 64 36</a>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <span class="text-capitilaze mr-3">Email:</span>
                      <a class="mb-0">adam_williams@gmail.org</a>
                    </div>
                    <div class="d-flex align-items-baseline">
                      <span class="text-capitilaze mr-3">FB</span>
                      <a class="mb-0">facebook.com/adam_williams</a>
                    </div>
                  </div>
                  <div class="d-flex flex-column" v-else>
                    <div
                      class="d-flex align-items-baseline"
                      v-for="(contact, k) in contactList"
                      :key="k"
                    >
                      <span class="text-capitilaze mr-3">{{
                        contact.contactName
                      }}</span>
                      <a class="mb-0">{{ contact.value }}</a>
                    </div>
                  </div>
                </div>
              </section>
              <section>
                <div class="d-flex flex-column justify-content-between">
                  <div class="row section-title align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                      <h2 class="text-uppercase">personality</h2>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                      <hr />
                    </div>
                  </div>
                  <ul
                    class="personality"
                    v-if="personality[0].personalDiscription.length == 0"
                  >
                    <li>Communicative</li>
                    <li>Punctuality</li>
                    <li>Creativity</li>
                    <li>Organized</li>
                    <li>Communicative</li>
                    <li>Punctuality</li>
                    <li>Creativity</li>
                    <li>Organized</li>
                  </ul>
                  <ul class="personality" v-else>
                    <li v-for="(personal, i) in personality" :key="i">
                      {{ personal.personalDiscription }}
                    </li>
                  </ul>
                </div>
              </section>
              <section>
                <div class="d-flex flex-column justify-content-between">
                  <div class="row section-title align-items-center">
                    <div class="col-lg-7 col-md-7 col-12">
                      <h2 class="text-uppercase">Languages</h2>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                      <hr />
                    </div>
                  </div>
                  <ul
                    v-if="
                      languages[0].languageName.length == 0 &&
                        languages[0].level.length == 0
                    "
                  >
                    <li class="row language align-items-center">
                      <div class="col-lg-4 col-md-4 col-6">
                        <span>Arabic</span>
                      </div>
                      <div class="col-lg-8 col-md-8 col-6">
                        <label class="level" style="width: 100%"></label>
                      </div>
                    </li>
                    <li class="row language align-items-center">
                      <div class="col-lg-4 col-md-4 col-6">
                        <span>French</span>
                      </div>
                      <div class="col-lg-8 col-md-8 col-6">
                        <label class="level" style="width: 50%"></label>
                      </div>
                    </li>
                    <li class="row language align-items-center">
                      <div class="col-lg-4 col-md-4 col-6">
                        <span>English</span>
                      </div>
                      <div class="col-lg-8 col-md-8 col-6">
                        <label class="level" style="width: 70%"></label>
                      </div>
                    </li>
                    <li class="row language align-items-center">
                      <div class="col-lg-4 col-md-4 col-6">
                        <span>German</span>
                      </div>
                      <div class="col-lg-8 col-md-8 col-6">
                        <label class="level" style="width: 20%"></label>
                      </div>
                    </li>
                  </ul>
                  <ul v-else>
                    <li
                      class="row language align-items-center"
                      v-for="(language, i) in languages"
                      :key="i"
                    >
                      <div class="col-lg-4 col-md-4 col-6">
                        <span>{{ language.languageName }}</span>
                      </div>
                      <div class="col-lg-8 col-md-8 col-6">
                        <label
                          class="level"
                          :style="{ width: language.level + '%' }"
                        ></label>
                      </div>
                    </li>
                  </ul>
                </div>
              </section>
            </div>
          </div>

          <div class="col-lg-8 col-md-8 col-12 bg-gray pt-5 right-side">
            <section>
              <div class="text-center text-uppercase">
                <div class="row align-items-center">
                  <div class="col-lg-5 col-md-5 col-12"></div>
                  <div class="col-lg-7 col-md-7 col-12">
                    <hr />
                  </div>
                </div>
                <div
                  class="cv-header"
                  v-if="
                    applicant[0].name.length == 0 &&
                      applicant[0].PosteTitle.length == 0
                  "
                >
                  <h1 class="text-uppercase">ophelia stevenson</h1>
                  <small class="text-uppercase">graphic and web designe</small>
                </div>
                <div
                  class="cv-header"
                  v-else
                  v-for="(app, index) in applicant"
                  :key="index"
                >
                  <h1 class="text-uppercase">{{ app.name }}</h1>
                  <small class="text-uppercase">{{ app.PosteTitle }}</small>
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
                <div
                  class="row px-3 align-items-baseline w-100"
                  v-if="CoverLetter.length == 0"
                >
                  <div class="d-flex flex-column justify-content-end">
                    <p>
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                      Commodi voluptates recusandae sit corrupti quod, laborum
                      neque consequatur delectus vero ratione quasi non quis
                      ipsum cum aperiam deleniti, minus culpa ipsa?
                    </p>
                    <p>
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                      Commodi voluptates recusandae sit corrupti quod, laborum
                      neque consequatur delectus vero ratione quasi non quis
                      ipsum cum aperiam deleniti, minus culpa ipsa?
                    </p>
                    <p>
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                      Commodi voluptates recusandae sit corrupti quod, laborum
                      neque consequatur delectus vero ratione quasi non quis
                      ipsum cum aperiam deleniti, minus culpa ipsa?
                    </p>
                    <p>
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                      Commodi voluptates recusandae sit corrupti quod, laborum
                      neque consequatur delectus vero ratione quasi non quis
                      ipsum cum aperiam deleniti, minus culpa ipsa?
                    </p>
                    <div class="d-flex flex-column align-items-end">
                      <h4
                        class="text-uppercase"
                        v-if="applicant[0].name.length == 0"
                      >
                        Applicant Name
                      </h4>
                      <h4
                        class="text-uppercase"
                        v-else
                        v-for="(app, index) in applicant"
                        :key="index"
                      >
                        {{ app.name }}
                      </h4>
                      <small>{{
                        new Date()
                          | dateFormat("DD MMMM YYYY", dateFormatConfig)
                      }}</small>
                    </div>
                  </div>
                </div>
                <div class="row px-3 align-items-baseline w-100" v-else>
                  <div class="d-flex flex-column justify-content-end">
                    <p>{{ CoverLetter }}</p>
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
                <div
                  class="row px-3 align-items-baseline"
                  v-if="Personal.length == 0"
                >
                  <div class="d-flex flex-column justify-content-end">
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Vitae placeat cumque suscipit quo commodi eaque qui, alias
                      culpa pariatur nobis. Magni aut aperiam assumenda est
                      ducimus cumque, porro commodi unde?
                    </p>
                    <p>
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Vitae placeat cumque suscipit quo commodi eaque qui, alias
                      culpa pariatur nobis. Magni aut aperiam assumenda est
                      ducimus cumque, porro commodi unde?
                    </p>
                  </div>
                </div>
                <div class="row px-3 align-items-baseline" v-else>
                  <div class="d-flex flex-column justify-content-end">
                    <p>{{ Personal }}</p>
                  </div>
                </div>
              </section>

              <section class="item">
                <div class="row section-title align-items-center">
                  <div class="col-lg-5 col-md-5 col-12">
                    <h2 class="text-uppercase">education</h2>
                  </div>
                  <div class="col-lg-7 col-md-7 col-12">
                    <hr />
                  </div>
                </div>

                <div
                  class="row px-3 align-items-baseline"
                  v-if="
                    Education[0].startDate.length == 0 &&
                      Education[0].endDate.length == 0 &&
                      Education[0].establishement.length == 0 &&
                      Education[0].diploma.length == 0
                  "
                >
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
                <div
                  class="row px-3 align-items-baseline"
                  v-if="
                    Education[0].startDate.length == 0 &&
                      Education[0].endDate.length == 0 &&
                      Education[0].establishement.length == 0 &&
                      Education[0].diploma.length == 0
                  "
                >
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
                <draggable
                  draggble="item"
                  
                  ghost-class="ghost"
                  :animation="200"
                  v-else
                >
                  <transition-group type="transition" name="flip-list">
                    <div
                      class="row px-3 align-items-baseline"
                      v-for="(edu, i) in Education"
                      :key="i"
                    >
                      <div class="col-lg-3 col-md-3 col-12">
                        <span class="date"
                          >{{ edu.startDate }} - {{ edu.endDate }}</span
                        >
                      </div>
                      <div class="col-lg-9 col-md-9 col-12">
                        <h3 class="text-uppercase">{{ edu.establishement }}</h3>
                        <p class="text-capitalize">{{ edu.diploma }}</p>
                      </div>
                    </div>
                  </transition-group>
                </draggable>
              </section>
              <section class="item">
                <div class="row section-title align-items-center">
                  <div class="col-lg-5 col-md-5 col-12">
                    <h2 class="text-uppercase">experience</h2>
                  </div>
                  <div class="col-lg-7 col-md-7 col-12">
                    <hr />
                  </div>
                </div>
                <div
                  class="row px-3 align-items-baseline"
                  v-if="
                    Experience[0].startDate.length == 0 &&
                      Experience[0].endDate.length == 0 &&
                      Experience[0].company.length == 0 &&
                      Experience[0].posteTitle.length == 0 &&
                      Experience[0].tasks.length == 0
                  "
                >
                  <div class="col-lg-3 col-md-3 col-12">
                    <span class="date">2014-2016</span>
                  </div>
                  <div class="col-lg-9 col-md-9 col-12">
                    <h3>Poste Title at Workname</h3>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Repudiandae voluptas aspernatur molestiae quasi eius
                      nesciunt maxime sunt, qui, eos enim magnam itaque
                      reiciendis! Dignissimos autem, totam error maiores
                      recusandae provident.
                    </p>
                  </div>
                </div>
                <div
                  class="row px-3 align-items-baseline"
                  v-if="
                    Experience[0].startDate.length == 0 &&
                      Experience[0].endDate.length == 0 &&
                      Experience[0].company.length == 0 &&
                      Experience[0].posteTitle.length == 0 &&
                      Experience[0].tasks.length == 0
                  "
                >
                  <div class="col-lg-3 col-md-3 col-12">
                    <span class="date">2012-2014</span>
                  </div>
                  <div class="col-lg-9 col-md-9 col-12">
                    <h3>Poste Title at Workname</h3>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Repudiandae voluptas aspernatur molestiae quasi eius
                      nesciunt maxime sunt, qui, eos enim magnam itaque
                      reiciendis! Dignissimos autem, totam error maiores
                      recusandae provident.
                    </p>
                  </div>
                </div>
                <div
                  class="row px-3 align-items-baseline"
                  v-if="
                    Experience[0].startDate.length == 0 &&
                      Experience[0].endDate.length == 0 &&
                      Experience[0].company.length == 0 &&
                      Experience[0].posteTitle.length == 0 &&
                      Experience[0].tasks.length == 0
                  "
                >
                  <div class="col-lg-3 col-md-3 col-12">
                    <span class="date">2014-2016</span>
                  </div>
                  <div class="col-lg-9 col-md-9 col-12">
                    <h3>Poste Title at Workname</h3>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                      Repudiandae voluptas aspernatur molestiae quasi eius
                      nesciunt maxime sunt, qui, eos enim magnam itaque
                      reiciendis! Dignissimos autem, totam error maiores
                      recusandae provident.
                    </p>
                  </div>
                </div>
                <draggable
                  draggble="item"
                 
                  ghost-class="ghost"
                  :animation="200"
                  v-else
                >
                  <transition-group type="transition" name="flip-list">
                    <div
                      class="row px-3 align-items-baseline"
                      v-for="(exp, e) in Experience"
                      :key="e"
                    >
                      <div class="col-lg-3 col-md-3 col-12">
                        <span class="date"
                          >{{ exp.startDate }}- {{ exp.endDate }}</span
                        >
                      </div>
                      <div class="col-lg-9 col-md-9 col-12">
                        <h3 class="text-uppercase">
                          {{ exp.posteTitle }} at {{ exp.company }}
                        </h3>
                        <p class="text-capitalize">{{ exp.tasks }}</p>
                      </div>
                    </div>
                  </transition-group>
                </draggable>
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
                <div
                  class="d-flex justify-content-around flex-wrap"
                  v-if="
                    skills[0].skillName.length == 0 &&
                      skills[0].level.length == 0
                  "
                >
                  <div
                    class="d-flex flex-column justify-content-center align-items-center position-relative"
                    v-for="(s, index) in skills"
                    :key="index"
                  >
                    <circle-slider
                      v-model="s.level"
                      circle-color="rgba(0, 0, 0, .3)"
                      progress-color="#000"
                      knob-color="transparent"
                      circleWidth="10"
                      progressWidth="10"
                      class="progress-circle"
                    >
                    </circle-slider>
                    <span class="skillName">{{ s.skillName }}</span>
                  </div>
                </div>
                <div class="d-flex justify-content-around flex-wrap" v-else>
                  <div
                    class="d-flex flex-column justify-content-center align-items-center position-relative"
                    v-for="(skill, index) in skills"
                    :key="index"
                  >
                    <circle-slider
                      v-model="skill.level"
                      circle-color="rgba(0, 0, 0, .3)"
                      progress-color="#000"
                      knob-color="transparent"
                      :circleWidth="10"
                      :progressWidth="10"
                      class="progress-circle"
                    >
                    </circle-slider>
                    <span class="skillName">{{ skill.skillName }}</span>
                  </div>
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
import draggable from "vuedraggable";
export default {
  components: {
    VueCircle,
    draggable,
    PictureInput,
  },
  data() {
    return {
      applicant: [
        {
          name: "",
          PosteTitle: "",
        },
      ],
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
          tasks: "",
        },
      ],
      skills: [
        {
          skillName: "JavaScript",
          level: 60,
        },
        {
          skillName: "jQuery",
          level: 70,
        },
        {
          skillName: "HTML5",
          level: 100,
        },
        {
          skillName: "CSS3",
          level: 90,
        },
      ],
      languages: [
        {
          languageName: "",
          level: "",
        },
      ],
      fill: { color: "#000" },
      dateFormatConfig: {
        dayOfWeekNames: [
          "Sunday",
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
        ],
        dayOfWeekNamesShort: ["Su", "Mo", "Tu", "We", "Tr", "Fr", "Sa"],
        monthNames: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December",
        ],
        monthNamesShort: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
      },
    };
  },
  methods: {
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
          doc.save("Curriculum Vitae.pdf");
        })
        .catch(function(error) {
          console.error("something went wrong!", error);
        });
    },
    addContact: function() {
      this.contactList.push({
        contactName: "",
        value: "",
        empty: false,
      });
    },
    addPersonality: function() {
      this.personality.push({
        personalDiscription: "",
      });
    },
    addLanguage: function() {
      this.languages.push({
        languageName: "",
        level: "",
      });
    },

    addSkill: function() {
      this.skills.push({
        skillName: "",
        level: "",
      });
    },
    addEducation: function() {
      this.Education.push({
        startDate: "",
        endDate: "",
        establishement: "",
        diploma: "",
      });
    },
    addExperience: function() {
      this.Experience.push({
        startDate: "",
        endDate: "",
        company: "",
        posteTitle: "",
        tasks: "",
      });
    }
  },
  computed:{
    parsedBody(){
      return this.Experience[0].tasks.replace(/\n/g,"<br>")
    }
  }
};
</script>

<style lang="scss" scoped>
.cv-form {
  background-color: #0d324c;
  padding: 24px;
  h1 {
    color: #fff;
    font-weight: 600;
    font-size: 48;
    margin-bottom: 40px;
  }
  label {
    color: #fff;
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    font-size: 18px;
  }
}

a {
  color: #a2a2a2;
  &:hover {
    color: #fff;
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

.form-group {
  margin-bottom: 8px;
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
    background-color: #861e1e;
    height: 20px;
    margin-bottom: 4px;
  }
}
h2 {
  color: #d72626;
  font-weight: 700;
  font-size: 24px;
}
.personality {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  ul {
    width: 50%;
  }
}
ul.personality {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  margin-bottom: 0px;
  li {
    width: 50%;
    margin-bottom: 4px;
  }
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
    font-weight: 700;
    display: flex;
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
    font-size: 18px;
    font-weight: 600;
    text-align: center;
    width: 75%;
  }
}
.contact {
  label {
    word-break: break-word;
  }
}

.right-side .sortable-drag {
  opacity: 0;
}

.flip-list-move {
  transition: transform 0.5s;
}

.sortable-chosen {
  cursor: grab;
}

.ghost {
  background-color: #d72626;
  opacity: 0.7;
  span,
  h3,
  p {
    color: #fff;
  }
}

.skillName {
  position: absolute;
  top: 40%;
  text-align: center;
  font-size: 14px;
  font-weight: 600;
  word-wrap: break-word;
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
