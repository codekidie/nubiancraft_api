<?php
class Controller_Customjewel extends Controller_Template
{

	public function action_index()
	{
		$data['customjewels'] = Model_Customjewel::find('all');
		$this->template->title = "3d jewels";
		$this->template->content = View::forge('customjewel/index', $data);

	}

		public function action_3dcustommodels()
	{
		$data['customjewels'] = Model_Customjewel::find('all');

		$this->template->title = "3d Jewels";
		$this->template->content = View::forge('customjewel/custom', $data);

	}

	public function get_clicked3d($id)
	{
		$data['materials'] = DB::select()->from('customjewels')->where('id', $id)->execute();
		$this->template->title = "3d Jewels";
		$this->template->content = View::forge('joborder/clientorder3d', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('customjewel');

		if ( ! $data['customjewel'] = Model_Customjewel::find($id))
		{
			Session::set_flash('error', 'Could not find customjewel #'.$id);
			Response::redirect('customjewel');
		}

		$this->template->title = "3d Jewels";
		$this->template->content = View::forge('customjewel/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Customjewel::validate('create');

			
				$customjewel = Model_Customjewel::forge(array(
					'materialname' => Input::post('materialname'),
					'embed' => Input::post('embed'),
					'laborcost' => Input::post('laborcost'),
					'weight' => Input::post('weight'),
					'gemsize' => Input::post('gemsize'),
					'numberofgems' => Input::post('numberofgems'),
				));

				if ($customjewel and $customjewel->save())
				{
					Session::set_flash('success', 'Added customjewel #'.$customjewel->id.'.');

					Response::redirect('customjewel');
				}

				else
				{
					Session::set_flash('error', 'Could not save customjewel.');
				}
		}

		$this->template->title = "3d jewels";
		$this->template->content = View::forge('customjewel/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('customjewel');

		if ( ! $customjewel = Model_Customjewel::find($id))
		{
			Session::set_flash('error', 'Could not find customjewel #'.$id);
			Response::redirect('customjewel');
		}

		$val = Model_Customjewel::validate('edit');

		if ($val->run())
		{
			$customjewel->materialname = Input::post('materialname');
			$customjewel->embed = Input::post('embed');
			$customjewel->laborcost = Input::post('laborcost');
			$customjewel->weight = Input::post('weight');
			$customjewel->gemsize = Input::post('gemsize');
			$customjewel->numberofgems = Input::post('numberofgems');

			if ($customjewel->save())
			{
				Session::set_flash('success', 'Updated customjewel #' . $id);

				Response::redirect('customjewel');
			}

			else
			{
				Session::set_flash('error', 'Could not update customjewel #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$customjewel->materialname = $val->validated('materialname');
				$customjewel->embed = $val->validated('embed');
				$customjewel->laborcost = $val->validated('laborcost');
				$customjewel->weight = $val->validated('weight');
				$customjewel->gemsize = $val->validated('gemsize');
				$customjewel->numberofgems = $val->validated('numberofgems');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('customjewel', $customjewel, false);
		}

		$this->template->title = "Customjewels";
		$this->template->content = View::forge('customjewel/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('customjewel');

		if ($customjewel = Model_Customjewel::find($id))
		{
			$customjewel->delete();

			Session::set_flash('success', 'Deleted customjewel #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete customjewel #'.$id);
		}

		Response::redirect('customjewel');

	}

}
