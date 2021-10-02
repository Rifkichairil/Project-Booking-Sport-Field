	<?php

    namespace App\Repositories;

    use App\Model\Category;
    use App\Model\Field;
    use App\Model\User;
    use Illuminate\Support\Facades\DB;
    use RealRashid\SweetAlert\Facades\Alert;


    use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
    //use Your Model

    /**
     * Class FieldRepositories.
     */
    class FieldRepositories
    {
        /**
         * @return string
         *  Return the model
         */
        public function first($id)
        {
            $field = Field::whereId($id)->firstOrFail();

            return $field;
        }

        public function get()
        {
            $field = Field::paginate(10);
            return $field;
        }

        public function getCategories()
        {
            $category = Category::get();

            return $category;
        }

        public function firstCategories($id)
        {
            $category = Category::whereId($id)->firstOrFail();

            return $category = Category::whereId($id)->firstOrFail();;
        }

        public function save($req)
        {
            DB::beginTransaction();
            try {
                //code...
                $field = Field::create([
                    'user_id'        => auth()->user()->id,
                    'field_name'     => $req->field_name,
                    'field_category' => $req->field_category,
                    'field_code'     => $req->field_code,
                    // 'category_id'    => $req->category_id,
                    'price'          => $req->price,
                    'image'          => $req->image->store('images/field'),
                    'fasilitas'      => $req->fasilitas,
                    'field_address'  => $req->field_address,
                    'no_rek'         => $req->no_rek,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                Alert::error(' Berhasil Menambah Lapangan');

                // throw $e;
            }
            DB::commit();
            Alert::success(' Berhasil Menambah Lapangan');
            return $field;
        }

        public function update($req, $id)
        {
            DB::beginTransaction();
            try {
                //code...
                $field = $this->first($id);

                $field->update([
                    'user_id'        => auth()->user()->id,
                    'field_name'     => $req->field_name,
                    'field_category' => $req->field_category,
                    'field_code'     => $req->field_code,
                    'price'          => $req->price,
                    'image'          => $req->image->store('images'),
                    'fasilitas'      => $req->fasilitas,
                    'field_address'  => $req->field_address,
                    'no_rek'         => $req->no_rek,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();
            Alert::success(' Berhasil Mengubah Lapangan');
            return $field;
        }

        public function delete($id)
        {
            DB::beginTransaction();
            try {
                $field = Field::whereId($id)->firstOrFail();
                $field->delete();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
            DB::commit();

            return true;
        }

        public function updateStatusEmail($id)
        {
            DB::beginTransaction();
            try {
                $user = User::whereId($id)->firstOrFail();

                if ($user->status == 0) {
                    $user->status = 1;
                } else {
                    $user->status = 0;
                }

                $user->save();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
            DB::commit();

            return $user;
        }
    }
