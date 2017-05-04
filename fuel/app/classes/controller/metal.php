<?php
class Controller_Metal extends Controller_Template
{

	public function action_index()
	{
		$data['metals'] = Model_Metal::find('all');
		$this->template->title = "Metals";
		$this->template->content = View::forge('metal/index', $data);

	}

	public function get_metals()
	{
		$data['metals'] = Model_Metal::find('all');
		$this->template->title = "Metals";
		$this->template->content = View::forge('metal/selection', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('metal');

		if ( ! $data['metal'] = Model_Metal::find($id))
		{
			Session::set_flash('error', 'Could not find metal #'.$id);
			Response::redirect('metal');
		}

		$this->template->title = "Metal";
		$this->template->content = View::forge('metal/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Metal::validate('create');

			if ($val->run())
			{
				$metal = Model_Metal::forge(array(
					'name' => Input::post('name'),
					'price' => Input::post('price'),
				));

				if ($metal and $metal->save())
				{
					Session::set_flash('success', 'Added metal #'.$metal->id.'.');

					Response::redirect('metal');
				}

				else
				{
					Session::set_flash('error', 'Could not save metal.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Metals";
		$this->template->content = View::forge('metal/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('metal');

		if ( ! $metal = Model_Metal::find($id))
		{
			Session::set_flash('error', 'Could not find metal #'.$id);
			Response::redirect('metal');
		}

		$val = Model_Metal::validate('edit');

		if ($val->run())
		{
			$metal->name = Input::post('name');
			$metal->price = Input::post('price');

			if ($metal->save())
			{
				Session::set_flash('success', 'Updated metal #' . $id);

				Response::redirect('metal');
			}

			else
			{
				Session::set_flash('error', 'Could not update metal #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$metal->name = $val->validated('name');
				$metal->price = $val->validated('price');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('metal', $metal, false);
		}

		$this->template->title = "Metals";
		$this->template->content = View::forge('metal/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('metal');

		if ($metal = Model_Metal::find($id))
		{
			$metal->delete();

			Session::set_flash('success', 'Deleted metal #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete metal #'.$id);
		}

		Response::redirect('metal');

	}

}
