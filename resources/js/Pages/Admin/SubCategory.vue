<template>
  <v-container class="">
    <v-row>
      <v-col>
        <v-simple-table>
          <template v-slot:default>
            <thead>
              <tr>
                <th>Title</th>
                <th>Country</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="subcategory in subcategory.data" :key="subcategory.id">
                <td v-text="subcategory.title"></td>
                <td v-text="subcategory.cartegory.country.country"></td>
                <td v-text="subcategory.cartegory.title"></td>
                <td>
                  <Link :href="`/admin/subcategory/edit/${subcategory.id}`">
                    <v-btn
                      small
                      elevation=""
                      rounded
                      color="blue"
                      class="white--text"
                    >
                      view
                    </v-btn>
                  </Link>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      </v-col>
    </v-row>
    <v-row>
      <pagination :links="subcategory.links" />
    </v-row>
  </v-container>
</template>

<script>
import Pagination from "../Components/Pagination.vue";
import AdminNavigation from "../Layouts/AdminNavigation.vue";
export default {
  layout: AdminNavigation,
  components: { Pagination },
  props: ["subcategory"],
};
</script>

<style>
</style>