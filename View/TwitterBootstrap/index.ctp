<?php $this->set('title_for_layout', 'TwitterBootstrap Plugin for CakePHP2.0'); ?>

<section id="alerts">
	<h2>Alerts</h2>
	<?php echo $this->Session->flash('notice'); ?>
	<?php echo $this->Session->flash('success'); ?>
	<?php echo $this->Session->flash('error'); ?>
</section>

<section id="forms">
	<div class="page-header">
		<h1>Forms</h1>
	</div>

	<h2>Example forms <small>using just form controls, no extra markup</small></h2>
	<div class="row">
		<div class="span3">
			<h3>Basic form</h3>
			<p>With v2.0, we have lighter and smarter defaults for form styles. No extra markup, just form controls.</p>
		</div>
		<div class="span9">

			<h3>Original</h3>
			<form class="well">
				<label>Label name</label>
				<input type="text" class="span3" placeholder="Type something…"> <span class="help-inline">Associated help text!</span>
				<p class="help-block">Example block-level help text here.</p>
				<label class="checkbox">
					<input type="checkbox"> Check me out
				</label>
				<button type="submit" class="btn">Submit</button>
			</form>

			<h3>BootstrapFormHelper</h3>
			<?php echo $this->Form->create('Test', array('class' => 'well')); ?>
				<?php echo $this->Form->input(uniqid(), array(
					'label' => 'Label name',
					'type' => 'text',
					'class' => 'span3',
					'placeholder' => 'Type something…',
					'helpInline' => 'Associated help text!',
					'helpBlock' => 'Example block-level help text here.',
					// 'before' => 'This is cheack for before.',
					// 'between' => 'This is cheack for between.',
					// 'after' => 'This is cheack for after.',
				)); ?>
				<?php echo $this->Form->input(uniqid(), array(
					'label' => 'Check me out',
					'type' => 'checkbox',
					// 'before' => 'This is cheack for before.',
					// 'between' => 'This is cheack for between.',
					// 'after' => 'This is cheack for after.',
				)); ?>
				<?php echo $this->Form->submit('Submit', array('icon' => 'pencil')); ?>
			<?php echo $this->Form->end(); ?>

			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;form</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"well"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;label&gt;</span><span class="pln">Label name</span><span class="tag">&lt;/label&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"text"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span3"</span><span class="pln"> </span><span class="atn">placeholder</span><span class="pun">=</span><span class="atv">"Type something…"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;span</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"help-inline"</span><span class="tag">&gt;</span><span class="pln">Associated help text!</span><span class="tag">&lt;/span&gt;</span></li><li class="L4"><span class="pln">  </span><span class="tag">&lt;label</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"checkbox"</span><span class="tag">&gt;</span></li><li class="L5"><span class="pln">    </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"checkbox"</span><span class="tag">&gt;</span><span class="pln"> Check me out</span></li><li class="L6"><span class="pln">  </span><span class="tag">&lt;/label&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"submit"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn"</span><span class="tag">&gt;</span><span class="pln">Submit</span><span class="tag">&lt;/button&gt;</span></li><li class="L8"><span class="tag">&lt;/form&gt;</span></li></ol></pre>
		</div>
	</div> <!-- /row -->
	<div class="row">
		<div class="span3">
			<h3>Search form</h3>
			<p>Reflecting default WebKit styles, just add <code>.form-search</code> for extra rounded search fields.</p>
		</div>
		<div class="span9">

			<h3>Original</h3>
			<form class="well form-search">
				<input type="text" class="input-medium search-query">
				<button type="submit" class="btn">Search</button>
			</form>

			<h3>BootstrapFormHelper</h3>
			<?php echo $this->Form->create('Test', array('class' => 'well form-search')); ?>
				<?php echo $this->Form->input(uniqid(), array(
					'type' => 'text',
					'class' => 'input-medium search-query',
				)); ?>
				<?php echo $this->Form->submit('Search'); ?>
			<?php echo $this->Form->end(); ?>

			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;form</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"well form-search"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"text"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"input-medium search-query"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"submit"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn"</span><span class="tag">&gt;</span><span class="pln">Search</span><span class="tag">&lt;/button&gt;</span></li><li class="L3"><span class="tag">&lt;/form&gt;</span></li></ol></pre>
		</div>
	</div> <!-- /row -->
	<div class="row">
		<div class="span3">
			<h3>Inline form</h3>
			<p>Inputs are block level to start. For <code>.form-inline</code> and <code>.form-horizontal</code>, we use inline-block.</p>
		</div>
		<div class="span9">

			<h3>Original</h3>
			<form class="well form-inline">
				<input type="text" class="input-small" placeholder="Email">
				<input type="password" class="input-small" placeholder="Password">
				<label class="checkbox">
					<input type="checkbox"> Remember me
				</label>
				<button type="submit" class="btn">Sign in</button>
			</form>

			<h3>BootstrapFormHelper</h3>
			<?php echo $this->Form->create('Test', array('class' => 'well form-inline')); ?>
				<?php echo $this->Form->input(uniqid(), array(
					'type' => 'text',
					'class' => 'input-small',
					'placeholder' => 'Email',
				)); ?>
				<?php echo $this->Form->input(uniqid(), array(
					'type' => 'password',
					'class' => 'input-small',
					'placeholder' => 'Password',
				)); ?>
				<?php echo $this->Form->input(uniqid(), array(
					'label' => 'Remember me',
					'type' => 'checkbox',
				)); ?>
				<?php echo $this->Form->submit('Sign in'); ?>
			<?php echo $this->Form->end(); ?>

			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;form</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"well form-inline"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"text"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"input-small"</span><span class="pln"> </span><span class="atn">placeholder</span><span class="pun">=</span><span class="atv">"Email"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"password"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"input-small"</span><span class="pln"> </span><span class="atn">placeholder</span><span class="pun">=</span><span class="atv">"Password"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;label</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"checkbox"</span><span class="tag">&gt;</span></li><li class="L4"><span class="pln">    </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"checkbox"</span><span class="tag">&gt;</span><span class="pln"> Remember me</span></li><li class="L5"><span class="pln">  </span><span class="tag">&lt;/label&gt;</span></li><li class="L6"><span class="pln">  </span><span class="tag">&lt;button</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"submit"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"btn"</span><span class="tag">&gt;</span><span class="pln">Sign in</span><span class="tag">&lt;/button&gt;</span></li><li class="L7"><span class="tag">&lt;/form&gt;</span></li></ol></pre>
		</div>
	</div><!-- /row -->

	<br>

	<h2>Horizontal forms</h2>
	<div class="row">
		<div class="span8">
			<form class="form-horizontal">
				<fieldset>
					<legend>Controls Bootstrap supports <small>Original</small></legend>
					<div class="control-group">
						<label class="control-label" for="input01">Text input</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="input01">
							<p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="optionsCheckbox">Checkbox</label>
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="optionsCheckbox" value="option1">
								Option one is this and that—be sure to include why it's great
							</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="select01">Select list</label>
						<div class="controls">
							<select id="select01">
								<option>something</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="multiSelect">Multicon-select</label>
						<div class="controls">
							<select multiple="multiple" id="multiSelect">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="fileInput">File input</label>
						<div class="controls">
							<input class="input-file" id="fileInput" type="file">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="textarea">Textarea</label>
						<div class="controls">
							<textarea class="input-xlarge" id="textarea" rows="3"></textarea>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>

			<?php echo $this->Form->create('Test', array('class' => 'form-horizontal')); ?>
				<fieldset>
					<legend>Controls Bootstrap supports <small>BootstrapFormHelper</small></legend>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Text input',
						'type' => 'text',
						'class' => 'input-xlarge',
						'helpBlock' => 'In addition to freeform text, any HTML5 text-based input appears like so.',
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Checkbox',
						'type' => 'checkbox',
						'after' => 'Option one is this and that—be sure to include why it\'s great',
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Select list',
						'type' => 'select',
						'options' => array(
							'something', '1', '2', '3', '4', '5',
						),
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Multicon-select',
						'type' => 'select',
						'multiple' => true,
						'options' => array(
							'1', '2', '3', '4', '5',
						),
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'File input',
						'type' => 'file',
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Textarea',
						'type' => 'textarea',
						'class' => 'input-xlarge',
					)); ?>
					<div class="form-actions">
						<?php echo $this->Form->submit('Save changes', array(
							'div' => false,
							'class' => 'btn btn-primary',
						)); ?>
						<button class="btn">Cancel</button>
					</div>
				</fieldset>
			<?php echo $this->Form->end(); ?>

			<h3>Example markup</h3>
			<p>Given the above example form layout, here's the markup associated with the first input and control group. The <code>.control-group</code>, <code>.control-label</code>, and <code>.controls</code> classes are all required for styling.</p>
			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;form</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"form-horizontal"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;fieldset&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;legend&gt;</span><span class="pln">Legend text</span><span class="tag">&lt;/legend&gt;</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"control-group"</span><span class="tag">&gt;</span></li><li class="L4"><span class="pln">      </span><span class="tag">&lt;label</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"control-label"</span><span class="pln"> </span><span class="atn">for</span><span class="pun">=</span><span class="atv">"input01"</span><span class="tag">&gt;</span><span class="pln">Text input</span><span class="tag">&lt;/label&gt;</span></li><li class="L5"><span class="pln">      </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"controls"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">        </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"text"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"input-xlarge"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"input01"</span><span class="tag">&gt;</span></li><li class="L7"><span class="pln">        </span><span class="tag">&lt;p</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"help-block"</span><span class="tag">&gt;</span><span class="pln">Supporting help text</span><span class="tag">&lt;/p&gt;</span></li><li class="L8"><span class="pln">      </span><span class="tag">&lt;/div&gt;</span></li><li class="L9"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L0"><span class="pln">  </span><span class="tag">&lt;/fieldset&gt;</span></li><li class="L1"><span class="tag">&lt;/form&gt;</span></li></ol></pre>
		</div>
		<div class="span4">
			<h3>What's included</h3>
			<p>Shown on the left are all the default form controls we support. Here's the bulleted list:</p>
			<ul>
				<li>text inputs (text, password, email, etc)</li>
				<li>checkbox</li>
				<li>radio</li>
				<li>select</li>
				<li>multiple select</li>
				<li>file input</li>
				<li>textarea</li>
			</ul>
			<hr>
			<h3>New defaults with v2.0</h3>
			<p>Up to v1.4, Bootstrap's default form styles used the horizontal layout. With Bootstrap 2, we removed that constraint to have smarter, more scalable defaults for any form.</p>
		</div>
	</div>

	<br>

	<div class="row">
		<div class="span8">
			<form class="form-horizontal">
				<fieldset>
					<legend>Form control states <small>Original</small></legend>
					<div class="control-group">
						<label class="control-label" for="focusedInput">Focused input</label>
						<div class="controls">
							<input class="input-xlarge focused" id="focusedInput" type="text" value="This is focused…">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Uneditable input</label>
						<div class="controls">
							<span class="input-xlarge uneditable-input">Some value here</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="disabledInput">Disabled input</label>
						<div class="controls">
							<input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="Disabled input here…" disabled="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="optionsCheckbox2">Disabled checkbox</label>
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="optionsCheckbox2" value="option1" disabled="">
								This is a disabled checkbox
							</label>
						</div>
					</div>
					<div class="control-group warning">
						<label class="control-label" for="inputWarning">Input with warning</label>
						<div class="controls">
							<input type="text" id="inputWarning">
							<span class="help-inline">Something may have gone wrong</span>
						</div>
					</div>
					<div class="control-group error">
						<label class="control-label" for="inputError">Input with error</label>
						<div class="controls">
							<input type="text" id="inputError">
							<span class="help-inline">Please correct the error</span>
						</div>
					</div>
					<div class="control-group success">
						<label class="control-label" for="inputSuccess">Input with success</label>
						<div class="controls">
							<input type="text" id="inputSuccess">
							<span class="help-inline">Woohoo!</span>
						</div>
					</div>
					<div class="control-group success">
						<label class="control-label" for="selectError">Select with success</label>
						<div class="controls">
							<select id="selectError">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<span class="help-inline">Woohoo!</span>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>

			<?php echo $this->Form->create('Test', array('class' => 'form-horizontal')); ?>
				<fieldset>
					<legend>Form control states <small>BootstrapFormHelper</small></legend>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Focused input',
						'type' => 'text',
						'class' => 'input-xlarge focused',
						'value' => 'This is focused…',
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Uneditable input',
						'type' => 'text',
						'class' => 'input-xlarge uneditable-input',
						'value' => 'Some value here',
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Disabled input',
						'type' => 'text',
						'class' => 'input-xlarge',
						'placeholder' => 'Disabled input here…',
						'disabled' => true,
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Disabled checkbox',
						'type' => 'checkbox',
						'after' => 'This is a disabled checkbox',
						'disabled' => true,
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Input with warning',
						'type' => 'text',
						'warning' => 'Something may have gone wrong',
					)); ?>
					<?php $this->validationErrors = array('User' => array('name' => array('empty'))); ?>
					<?php echo $this->Form->input('User.name', array(
						'label' => 'Input with error',
						'type' => 'text',
						'error' => array('empty' =>'Please correct the error'),
						// 'after' => 'This is cheack for after.',
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Input with success',
						'type' => 'text',
						'success' => 'Woohoo!',
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Select with success',
						'type' => 'select',
						'success' => 'Woohoo!',
						'options' => array('1', '2', '3', '4', '5'),
					)); ?>
					<div class="form-actions">
						<?php echo $this->Form->submit('Save changes', array(
							'div' => false,
							'class' => 'btn btn-primary',
						)); ?>
						<button class="btn">Cancel</button>
					</div>
				</fieldset>
			<?php echo $this->Form->end(); ?>

		</div>
		<div class="span4">
			<h3>Redesigned browser states</h3>
			<p>Bootstrap features styles for browser-supported focused and <code>disabled</code> states. We remove the default Webkit <code>outline</code> and apply a <code>box-shadow</code> in its place for <code>:focus</code>.</p>
			<hr>
			<h3>Form validation</h3>
			<p>It also includes validation styles for errors, warnings, and success. To use, add the error class to the surrounding <code>.control-group</code>.</p>
			<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;fieldset</span></li><li class="L1"><span class="pln">  </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"control-group error"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">  …</span></li><li class="L3"><span class="tag">&lt;/fieldset&gt;</span></li></ol></pre>
		</div>
	</div>

	<br>

	<div class="row">
		<div class="span8">
			<form class="form-horizontal">
				<fieldset>
					<legend>Extending form controls <small>Original</small></legend>
					<div class="control-group">
						<label class="control-label">Form grid sizes</label>
						<div class="controls docs-input-sizes">
							<input class="span1" type="text" placeholder=".span1">
							<input class="span2" type="text" placeholder=".span2">
							<input class="span3" type="text" placeholder=".span3">
							<select class="span1">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<select class="span2">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<select class="span3">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<p class="help-block">Use the same <code>.span*</code> classes from the grid system for input sizes.</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Alternate sizes</label>
						<div class="controls docs-input-sizes">
							<input class="input-mini" type="text" placeholder=".input-mini">
							<input class="input-small" type="text" placeholder=".input-small">
							<input class="input-medium" type="text" placeholder=".input-medium">
							<p class="help-block">You may also use static classes that don't map to the grid, adapt to the responsive CSS styles, or account for varying types of controls (e.g., <code>input</code> vs. <code>select</code>).</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="prependedInput">Prepended text</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">@</span><input class="span2" id="prependedInput" size="16" type="text">
							</div>
							<p class="help-block">Here's some help text</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="appendedInput">Appended text</label>
						<div class="controls">
							<div class="input-append">
								<input class="span2" id="appendedInput" size="16" type="text"><span class="add-on">.00</span>
							</div>
							<span class="help-inline">Here's more help text</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="appendedPrependedInput">Append and prepend</label>
						<div class="controls">
							<div class="input-prepend input-append">
								<span class="add-on">$</span><input class="span2" id="appendedPrependedInput" size="16" type="text"><span class="add-on">.00</span>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="appendedPrependedInput">Append with button</label>
						<div class="controls">
							<div class="input-append">
								<input class="span2" id="appendedPrependedInput" size="16" type="text"><button class="btn" type="button">Go!</button>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="appendedInputButtons">Two-button append</label>
						<div class="controls">
							<div class="input-append">
								<input class="span2" id="appendedInputButtons" size="16" type="text"><button class="btn" type="button">Search</button><button class="btn" type="button">Options</button>
							</div>
							</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inlineCheckboxes">Inline checkboxes</label>
						<div class="controls">
							<label class="checkbox inline">
								<input type="checkbox" id="inlineCheckbox1" value="option1"> 1
							</label>
							<label class="checkbox inline">
								<input type="checkbox" id="inlineCheckbox2" value="option2"> 2
							</label>
							<label class="checkbox inline">
								<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
							</label>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="optionsCheckboxList">Checkboxes</label>
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" name="optionsCheckboxList1" value="option1">
								Option one is this and that—be sure to include why it's great
							</label>
							<label class="checkbox">
								<input type="checkbox" name="optionsCheckboxList2" value="option2">
								Option two can also be checked and included in form results
							</label>
							<label class="checkbox">
								<input type="checkbox" name="optionsCheckboxList3" value="option3">
								Option three can—yes, you guessed it—also be checked and included in form results
							</label>
							<p class="help-block"><strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.</p>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Radio buttons</label>
						<div class="controls">
							<label class="radio">
								<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
								Option one is this and that—be sure to include why it's great
							</label>
							<label class="radio">
								<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								Option two can is something else and selecting it will deselect option one
							</label>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save changes</button>
						<button class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>

			<?php echo $this->Form->create('Test', array('class' => 'form-horizontal')); ?>
				<fieldset>
					<legend>Extending form controls <small>BootstrapFormHelper</small></legend>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Prepended text',
						'type' => 'text',
						'class' => 'span2',
						'prepend' => '@',
						'helpBlock' => 'Here\'s some help text',
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Appended text',
						'type' => 'text',
						'class' => 'span2',
						'append' => '.00',
						'helpInline' => 'Here\'s more help text',
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Append and prepend',
						'type' => 'text',
						'class' => 'span2',
						'prepend' => '$',
						'append' => '.00',
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Append with button',
						'type' => 'text',
						'class' => 'span2',
						'append' => array('Go!', array('wrap' => 'button', 'class' => 'btn')),
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Two-button append',
						'type' => 'text',
						'class' => 'span2',
						'append' => array(
							array('Search', array('wrap' => 'button', 'class' => 'btn')),
							array('Options', array('wrap' => 'button', 'class' => 'btn')),
						)
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Inline checkboxes',
						'type' => 'select',
						'multiple' => 'checkbox inline',
						'options' => array('1', '2', '3'),
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Checkboxes',
						'type' => 'select',
						'multiple' => 'checkbox',
						'options' => array(
							'1' => 'Option one is this and that—be sure to include why it\'s great',
							'2' => 'Option two can also be checked and included in form results',
							'3' => 'Option three can—yes, you guessed it—also be checked and included in form results',
						),
						'helpBlock' => '<strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.',
					)); ?>
					<?php echo $this->Form->input(uniqid(), array(
						'label' => 'Radio buttons',
						'type' => 'radio',
						'options' => array(
							'1' => 'Option one is this and that—be sure to include why it\'s great',
							'2' => 'Option two can is something else and selecting it will deselect option one',
						),
					)); ?>
					<div class="form-actions">
						<?php echo $this->Form->submit('Save changes', array(
							'div' => false,
							'class' => 'btn btn-primary',
						)); ?>
						<button class="btn">Cancel</button>
					</div>
				</fieldset>
			<?php echo $this->Form->end(); ?>

		</div>
		<div class="span4">
			<h3>Prepend &amp; append inputs</h3>
			<p>Input groups—with appended or prepended text—provide an easy way to give more context for your inputs. Great examples include the @ sign for Twitter usernames or $ for finances.</p>
			<hr>
			<h3>Checkboxes and radios</h3>
			<p>Up to v1.4, Bootstrap required extra markup around checkboxes and radios to stack them. Now, it's a simple matter of repeating the <code>&lt;label class="checkbox"&gt;</code> that wraps the <code>&lt;input type="checkbox"&gt;</code>.</p>
			<p>Inline checkboxes and radios are also supported. Just add <code>.inline</code> to any <code>.checkbox</code> or <code>.radio</code> and you're done.</p>
			<hr>
			<h4>Inline forms and append/prepend</h4>
			<p>To use prepend or append inputs in an inline form, be sure to place the <code>.add-on</code> and <code>input</code> on the same line, without spaces.</p>
			<hr>
			<h4>Form help text</h4>
			<p>To add help text for your form inputs, include inline help text with <code>&lt;span class="help-inline"&gt;</code> or a help text block with <code>&lt;p class="help-block"&gt;</code> after the input element.</p>
		</div>
	</div><!-- /row -->
</section>

<section id="paginate">
	<h2>Paginate</h2>
	<?php $this->request->params['paging']['Example'] = array(
		'page' => 2,
		'current' => 20,
		'count' => 100,
		'prevPage' => true,
		'nextPage' => true,
		'pageCount' => 5,
		'order' => array(),
		'limit' => 20,
		'options' => array(),
		'paramType' => 'named',
	); // test params ?>
	<?php echo $this->Paginator->pagination(array('model' => 'Example')); ?>
	<?php echo $this->Paginator->pager(array('model' => 'Example')); ?>
</section>

<section id="breadcrumb">
	<h2>Breadcrumb</h2>
	<?php echo $this->Html->breadcrumb(array(
		$this->Html->link('one', '/one'),
		$this->Html->link('two', '/two'),
		'three',
	)); ?>
</section>

<section id="button">
	<h2>Buttons</h2>
	<div class="row">
		<div class="span4">
			<div class="btn-toolbar" style="margin-bottom: 9px">
				<div class="btn-group">
					<?php echo $this->Html->link(null, '#', array('class' => 'btn', 'icon' => 'align-left')); ?>
					<?php echo $this->Html->link(null, '#', array('class' => 'btn', 'icon' => 'align-center')); ?>
					<?php echo $this->Html->link(null, '#', array('class' => 'btn', 'icon' => 'align-right')); ?>
					<?php echo $this->Html->link(null, '#', array('class' => 'btn', 'icon' => 'align-justify')); ?>
				</div>
				<div class="btn-group">
					<?php echo $this->Html->link('User', '#', array('class' => 'btn btn-primary', 'icon' => 'user white')); ?>
					<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><?php echo $this->Html->link('Edit', '#', array('icon' => 'pencil')); ?></li>
						<li><?php echo $this->Html->link('Delete', '#', array('icon' => 'trash')); ?></li>
						<li><?php echo $this->Html->link('Ban', '#', array('icon' => 'ban-circle')); ?></li>
						<li class="divider"></li>
						<li><?php echo $this->Html->link('Make admin', '#'); ?></li>
					</ul>
				</div>
			</div>
			<p>
				<?php echo $this->Html->link('Refresh', '#', array('class' => 'btn', 'icon' => 'refresh')); ?>
				<?php echo $this->Html->link('Checkout', '#', array('class' => 'btn btn-success', 'icon' => 'shopping-cart white')); ?>
				<?php echo $this->Html->link('Delete', '#', array('class' => 'btn btn-danger', 'icon' => 'trash white')); ?>
			</p>
			<p>
				<?php echo $this->Html->link('Comment', '#', array('class' => 'btn btn-large', 'icon' => 'comment')); ?>
				<?php echo $this->Html->link('Settings', '#', array('class' => 'btn btn-small', 'icon' => 'cog')); ?>
				<?php echo $this->Html->link('More Info', '#', array('class' => 'btn btn-small btn-info', 'icon' => 'info-sign white')); ?>
			</p>
		</div>
		<div class="span4">
			<div class="well" style="padding: 8px 0;">
				<ul class="nav nav-list">
					<li class="active"><?php echo $this->Html->link('Home', '#', array('icon' => 'home white')); ?></li>
					<li><?php echo $this->Html->link('Library', '#', array('icon' => 'book')); ?></li>
					<li><?php echo $this->Html->link('Applications', '#', array('icon' => 'pencil')); ?></li>
				</ul>
			</div> <!-- /well -->
		</div>
		<div class="span4">
			<?php echo $this->Form->input('text', array('class' => 'span2', 'label' => 'Email address', 'prepend' => $this->Html->icon('envelope'))); ?>
		</div>
	</div>
</section>