<template>
  <v-container class="">
    <v-row>
      <v-col>
        <div class="display-1">Create Subcategory</div>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" sm="3">
        <v-row dense>
          <v-col>
            <div class="title">Subcategory Avatar</div>
          </v-col>
          <v-col cols="12">
            <v-img :src="'/test/category-demo.jpeg'" aspect-ratio="1"></v-img>
          </v-col>
          <v-col cols="12">
            <v-form>
              <div class="grid space-y-2">
                <label for="" v-if="processing" class="text-green-700"></label>
                <label for="">Enter Image</label>
              </div>
              <v-file-input
                outlined
                dense
                counter
                show-size
                v-model="form.image"
                :rules="required"
                :disabled="loading"
                :loading="loading"
                :error-messages="errors.image"
                placeholder="Edit Image"
              ></v-file-input>
            </v-form>
          </v-col>
        </v-row>
      </v-col>
      <v-col cols="12" sm="9">
        <v-card outlined :loading="loading" :disabled="loading">
          <v-card-title> Subcategory Info </v-card-title>
          <v-divider class=""></v-divider>
          <v-card-text>
            <v-form v-model="valid">
              <v-row dense>
                <v-col cols="12">
                  <label for="">Title</label>
                  <v-text-field
                    outlined
                    placeholder="Title"
                    :rules="required"
                    v-model="form.title"
                    :error-messages="errors.title"
                  ></v-text-field>
                </v-col>
                <v-col cols="12">
                  <label for="">Country</label>
                  <v-select
                    :rules="required"
                    :items="countries"
                    item-text="country"
                    item-value="id"
                    :error-messages="errors.country"
                    v-model="form.country"
                    outlined
                    placeholder="Please select"
                  ></v-select>
                </v-col>
                <v-col cols="12">
                  <label for="">Category</label>
                  <v-select
                    :rules="required"
                    :items="category"
                    item-text="title"
                    item-value="id"
                    :error-messages="errors.category"
                    v-model="form.category"
                    outlined
                    placeholder="Please select"
                  ></v-select>
                </v-col>

                <v-col cols="12"> </v-col>
                <v-col> </v-col>
              </v-row>
              <v-row justify="end" class="pr-4 pb-4">
                <div class="grid justify-end grid-cols-1 space-x-2">
                  <v-btn
                    depressed
                    :disabled="!valid"
                    @click="create()"
                    class="white--text"
                    elevation=""
                    color="blue darken-2"
                    >create</v-btn
                  >
                </div>
              </v-row>
            </v-form>
          </v-card-text>
        </v-card>
      </v-col>
      <v-col>
        <v-snackbar
          color="green darken-2"
          class="white--text"
          absolute
          transition="slide-x-reverse-transition"
          right
          top
          v-model="snack.value"
          :timeout="3000"
        >
          <div v-text="snack.text"></div>
          <template v-slot:action="{ attrs }">
            <v-btn color="red" text v-bind="attrs" @click="snack.text = false">
              close
            </v-btn>
          </template>
        </v-snackbar>
      </v-col>
    </v-row>
    <v-row>
      <v-snackbar
        v-model="processing"
        :timeout="timeout"
        :color="color"
        tile
        absolute
        right
        transition="slide-x-reverse-transition"
        class="white--text"
      >
        <div class="font-sembold text-lg" v-text="text"></div>
      </v-snackbar>
    </v-row>
  </v-container>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import AdminNavigation from "../Layouts/AdminNavigation.vue";
export default {
  layout: AdminNavigation,
  props: ["errors", "countries"],
  data() {
    return {
      items: {
        status: [
          { id: 1, text: "ACTIVE" },
          { id: 2, text: "INACTIVE" },
        ],
      },
      loading: false,
      required: [(v) => !!v || "This field is required"],
      content: null,
      color: null,
      timeout: null,
      loading: false,
      text: null,
      redirect: false,
      valid: false,
      processing: null,
      required: [(v) => !!v || "This field is required"],
      snack: {
        text: null,
        value: false,
      },
      form: {
        image: null,
        title: null,
        category: null,
        status: null,
        country: null,
      },
    };
  },
  watch: {
    redirect() {
      Inertia.get("/admin/subcategories");
    },
  },
  computed: {
    category() {
      for (var country = 0; country < this.countries.length; country++) {
        if (this.countries[country].id === this.form.country) {
          return this.countries[country].cartegory;
        }
      }
    },
  },
  methods: {
    create() {
      Inertia.post(`/admin/subcategory/store`, this.form, {
        forceFormData: true,
        preserveScroll: true,
        preserveState: true,
        onStart: () => {
          this.processing = true;
          this.timeout = 100000;
          this.loading = true;

          this.color = "yellow darken-3";
          this.text = "Subcategory upload in progress ...";
        },
        onSuccess: () => {
          this.timeout = 3000;
          this.color = "green darken-3";
          this.text = "Subcategory added successfully";
          this.redirect = true;
          this.loading = false;
        },
        onError: () => {
          this.timeout = 2000;
          this.loading = false;
          this.color = "red darken-2";
          this.text = "Failed, please check for any errors";
        },
      });
    },
  },
};
</script>

<style>
</style>