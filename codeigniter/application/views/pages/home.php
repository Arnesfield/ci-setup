<div class="container my-pt-1 my-pb-5">

  <div class="my-pt-1">
    <h1>CodeIgniter Project Setup</h1>
    <hr>
    <h5>A web application project setup using <a target="_blank" href="https://codeigniter.com/">CodeIgniter</a> (v3.1.6).</h5>
  </div>

  <div class="my-pt-1">
    <h3>Third-party</h3>
    <hr>
    <p>This setup includes the following third-party tools, fonts, modules, or frameworks:</p>
    <ul>
      <li><a target="_blank" href="https://getbootstrap.com/docs/3.3/">Bootstrap</a> (with responsive grid only)</li>
      <li><a target="_blank" href="https://jquery.com/">jQuery</a></li>
      <li><a target="_blank" href="https://getmdl.io/">Material Design Lite</a></li>
      <li><a target="_blank" href="https://material.io/icons/">Material Icons</a></li>
      <li>Roboto Font
        (<a target="_blank" href="https://fonts.google.com/specimen/Roboto">Normal</a>,
        <a target="_blank" href="https://fonts.google.com/specimen/Roboto+Condensed">Condensed</a>,
        <a target="_blank" href="https://fonts.google.com/specimen/Roboto+Mono">Mono</a>,
        <a target="_blank" href="https://fonts.google.com/specimen/Roboto+Slab">Slab</a>)
      </li>
      <li><a target="_blank" href="https://github.com/Arnesfield/project-my">my</a></li>
      <li><a target="_blank" href="https://github.com/Arnesfield/inherit.js">inherit.js</a></li>
    </ul>
  </div>

  <div class="my-pt-1">
    <h3>What's inside?</h3>
    <hr>
    <p>CodeIgniter's <strong>application</strong> and <strong>system</strong> directories are separated from the <strong>public</strong> directory.</p>
    
    <pre>

  project/
  |-- codeigniter/
  |   |-- application/
  |   |-- system/
  |
  |-- public/
      |-- assets/
      |   |-- css/
      |   |-- images/
      |   |-- js/
      |
      |-- vendor/
      |   |-- third-party/
      |
      |-- .htaccess
      |-- index.php
    </pre>
  </div>

  <div class="my-pt-1">
    <h3>Release Notes</h3>
    <hr>

    <h4>v1.4 (<a target="_blank" href="https://github.com/Arnesfield/ci-setup/releases/latest">latest</a>)</h4>
    <ul>
      <li>Added <code>MY_CRUD_Model</code> in <code>application/core</code>.</li>
    </ul>

    <h4>v1.3.1</h4>
    <ul>
      <li>Updated CodeIgniter from <code>v3.1.5</code> to <code>v3.1.6</code>.</li>
      <li>Updated and fixed <code>codeigniter/.gitignore</code>.</li>
    </ul>

    <h4>v1.3</h4>
    <ul>
      <li>Allowed multiple views to load in <code>MY_View_Controller</code></li>
      <li>Fixed <code>index.php</code> problem in <code>base_url</code></li>
    </ul>

    <h4>v1.2</h4>
    <ul>
      <li>Updated <code>MY_View_Controller</code> in <code>application/core</code></li>
      <li>Updated dynamic <code>base_url</code> in <code>config/config.php</code></li>
      <li>Restricted directory listing in <code>public/.htaccess</code></li>
      <li>Removed <code>any</code> route in <code>config/routes.php</code></li>
    </ul>

    <h4>v1.1</h4>
    <ul>
      <li>Added custom controller for handling views</li>
      <li>Renamed <code>codeigniter/app/</code> to <code>codeigniter/application/</code></li>
      <li>Added <code>email.php.example</code> in <code>application/config/</code></li>
    </ul>
  </div>

</div>