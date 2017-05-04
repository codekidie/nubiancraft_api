<?php
class Controller_3djewel extends Controller_Template
{

	public function action_index()
	{
		$data['3djewels'] = Model_3djewel::find('all');
		$this->template->title = "3djewels";
		$this->template->content = View::forge('3djewel/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('3djewel');

		if ( ! $data['3djewel'] = Model_3djewel::find($id))
		{
			Session::set_flash('error', 'Could not find 3djewel #'.$id);
			Response::redirect('3djewel');
		}

		$this->template->title = "3djewel";
		$this->template->content = View::forge('3djewel/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_3djewel::validate('create');

			if ($val->run())
			{
				$a33djewel = Model_3djewel::forge(array(
					'materialname' => Input::post('materialname'),
					'embed' => Input::post('embed'),
					'laborcost' => Input::post('laborcost'),
					'weight' => Input::post('weight'),
					'gemsize' => Input::post('gemsize'),
					'numberofgems' => Input::post('numberofgems'),
				));

				if ($a33djewel and $a33djewel->save())
				{
					Session::set_flash('success', 'Added 3djewel #'.$a33djewel->id.'.');

					Response::redirect('3djewel');
				}

				else
				{
					Session::set_flash('error', 'Could not save 3djewel.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "3Djewels";
		$this->template->content = View::forge('3djewel/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('3djewel');

		if ( ! $3djewel = Model_3djewel::find($id))
		{
			Session::set_flash('error', 'Could not find 3djewel #'.$id);
			Response::redirect('3djewel');
		}

		$val = Model_3djewel::validate('edit');

		if ($val->run())
		{
			$3djewel->materialname = Input::post('materialname');
			$3djewel->embed = Input::post('embed');
			$3djewel->laborcost = Input::post('laborcost');
			$3djewel->weight = Input::post('weight');
			$3djewel->gemsize = Input::post('gemsize');
			$3djewel->numberofgems = Input::post('numberofgems');

			if ($3djewel->save())
			{
				Session::set_flash('success', 'Updated 3djewel #' . $id);

				Response::redirect('3djewel');
			}

			else
			{
				Session::set_flash('error', 'Could not update 3djewel #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$3djewel->materialname = $val->validated('materialname');
				$3djewel->embed = $val->validated('embed');
				$3djewel->laborcost = $val->validated('laborcost');
				$3djewel->weight = $val->validated('weight');
				$3djewel->gemsize = $val->validated('gemsize');
				$3djewel->numberofgems = $val->validated('numberofgems');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('3djewel', $3djewel, false);
		}

		$this->template->title = "3djewels";
		$this->template->content = View::forge('3djewel/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('3djewel');

		if ($3djewel = Model_3djewel::find($id))
		{
			$3djewel->delete();

			Session::set_flash('success', 'Deleted 3djewel #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete 3djewel #'.$id);
		}

		Response::redirect('3djewel');

	}

}
