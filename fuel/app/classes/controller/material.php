<?php
class Controller_Material extends Controller_Template
{

	public function action_index()
	{
		$data['materials'] = Model_Material::find('all');
		$this->template->title = "Materials";
		$this->template->content = View::forge('material/index', $data);

	}

	public function action_earings()
	{
		$data['materials'] = Model_Material::find('all', array(
			    'where' => array(
			        array('type', 'earings'),
			    ),
			    'order_by' => array('id' => 'desc'),
			));

		$this->template->title = "Materials";
		$this->template->content = View::forge('material/earings', $data);

	}

		public function action_bracelet()
	{
		$data['materials'] = Model_Material::find('all', array(
			    'where' => array(
			        array('type', 'Bracelet'),
			    ),
			    'order_by' => array('id' => 'desc'),
			));

		$this->template->title = "Materials";
		$this->template->content = View::forge('material/earings', $data);

	}

	public function get_clickedearings($id)
	{
		$data['materials'] = DB::select()->from('materials')->where('id', $id)->execute();
		$this->template->title = "Materials";
		$this->template->content = View::forge('joborder/clientorder', $data);

	}

	public function action_ring()
	{
		$data['materials'] = Model_Material::find('all', array(
			    'where' => array(
			        array('type', 'ring'),
			    ),
			    'order_by' => array('id' => 'desc'),
			));

		$this->template->title = "Materials";
		$this->template->content = View::forge('material/earings', $data);

	}

	public function action_necklace()
	{
		$data['materials'] = Model_Material::find('all', array(
			    'where' => array(
			        array('type', 'necklace'),
			    ),
			    'order_by' => array('id' => 'desc'),
			));

		$this->template->title = "Materials";
		$this->template->content = View::forge('material/earings', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('material');

		if ( ! $data['material'] = Model_Material::find($id))
		{
			Session::set_flash('error', 'Could not find material #'.$id);
			Response::redirect('material');
		}

		$this->template->title = "Material";
		$this->template->content = View::forge('material/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Material::validate('create');

			if ($val->run())
			{
				

				$config = array(
				    'path' => DOCROOT.'files',
				    'randomize' => false,
				    'ext_whitelist' => array('jpeg', 'jpg','png'),
				);

				// process the uploaded files in $_FILES
				Upload::process($config);

				// if there are any valid files
				if (Upload::is_valid())
				{
				    // save them according to the config
				    Upload::save();

				    // call a model method to update the database
				    foreach(Upload::get_files() as $file)
					{
					    $filename = $file['name'];
						

						$material = Model_Material::forge(array(
							'materialname' => Input::post('materialname'),
							'materialimage' => $filename,
							'laborcost' => Input::post('laborcost'),
							'weight' => Input::post('weight'),
							'gemsize' => Input::post('gemsize'),
							'type' => Input::post('type'),
							'numberofgems' => Input::post('numberofgems')
						));
						if ($material and $material->save())
						{
							Session::set_flash('success', 'Added material #'.$material->id.'.');

							Response::redirect('material');
						}

						else
						{
							Session::set_flash('error', 'Could not save material.');
						}
					}
				    
				}

				if (empty($filetracker)) {
					$filetracker = '';
				}

				// and process any errors
				foreach (Upload::get_errors() as $file)
				{
				    // $file is an array with all file information,
				    // $file['errors'] contains an array of all error occurred
				    // each array element is an an array containing 'error' and 'message'
				}

				
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Materials";
		$this->template->content = View::forge('material/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('material');

		if ( ! $material = Model_Material::find($id))
		{
			Session::set_flash('error', 'Could not find material #'.$id);
			Response::redirect('material');
		}

		$val = Model_Material::validate('edit');

		if ($val->run())
		{
			$material->materialname = Input::post('materialname');
			$material->materialimage = Input::post('materialimage');
			$material->material = Input::post('material');
			$material->cost = Input::post('cost');

			if ($material->save())
			{
				Session::set_flash('success', 'Updated material #' . $id);

				Response::redirect('material');
			}

			else
			{
				Session::set_flash('error', 'Could not update material #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$material->materialname = $val->validated('materialname');
				$material->materialimage = $val->validated('materialimage');
				$material->material = $val->validated('material');
				$material->cost = $val->validated('cost');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('material', $material, false);
		}

		$this->template->title = "Materials";
		$this->template->content = View::forge('material/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('material');

		if ($material = Model_Material::find($id))
		{
			$material->delete();

			Session::set_flash('success', 'Deleted material #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete material #'.$id);
		}

		Response::redirect('material');

	}

}
