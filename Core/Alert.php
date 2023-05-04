<?php

class Alert
{
  private $type;
  private $message;
  private $icon;

  public function __construct($type = "success", $icon = "", $message = "")
  {
    $this->type = $type;
    $this->icon = $icon;
    $this->message = $message;

    switch (strtolower($this->type)) {
      case ALERT_TYPE::SUCCESS:
        $this->if_empty_Set_icon_to("<i class='bi bi-check'></i>");
        $this->if_empty_Set_message_to("successful");
        break;
      case ALERT_TYPE::INFO:
        $this->if_empty_Set_icon_to("<i class='fa fa-info'></i>");
        $this->if_empty_Set_message_to("Information");
        break;
      case ALERT_TYPE::WARNING:
        $this->if_empty_Set_icon_to("<i class='fa fa-exclamation-triangle'></i>");
        $this->if_empty_Set_message_to("Warning");
        break;
      case ALERT_TYPE::ERROR:
        $this->if_empty_Set_icon_to("<i class='fa fa-exclamation-circle'></i>");
        $this->if_empty_Set_message_to("Error");
        break;
      default:
        $this->if_empty_Set_icon_to("<i class='fa fa-info'></i>");
        $this->if_empty_Set_message_to("Information");
        break;
    }
  }

  private function if_empty_Set_message_to($message)
  {
    if (empty($this->message) || !isset($this->message)) {
      $this->message = $message;
    }
  }
  private function if_empty_Set_icon_to($icon)
  {
    if (empty($this->icon) || !isset($this->icon)) {
      $this->icon = $icon;
    }
  }


  public function show_default_alert()
  {
    echo "
        <style>
        .alert {
          position: fixed;
          width: fit-content;
          top: 6rem;
          right: calc(-100% - 1rem);
          background-color: rgb(48, 48, 48);
          color: #fff;
          padding: 0.75rem 1.25rem;
          display: flex;
          align-items: center;
          justify-content: space-between;
          pointer-events: none;
          border-radius: 5px;
          box-shadow: 0px 1px 5px 1px rgba(0, 0, 0, 0.3);
          z-index: 9999;
          transition: right 0.5s ease-in-out;
        }

        .show{
            right: 1rem;
        }

        .alert>i {
          font-size: 1.5rem;
          margin-right: 1rem;
        }
        .alert h4 {
          text-transform: uppercase;
          font-size: 1rem;
          margin-bottom: 0.2rem;
          padding-bottom: 0.2rem;
          border-bottom: 1px solid #ccc;
        }

        .alert_contnet{
          padding-left: 1rem;
          border-left: 1px solid #fff;
        }
        
        .alert p {
          font-size: 0.9rem;
          padding-top: 0.2rem;
        }
        .success {
          background: #1d9a5f;
        }
        .error {
          background: #d63031;
        }
        .warning {
          background: #d8961b;
        }
        .info {
          background: #0984e3;
        }
      </style>
      <div class='alert " . $this->type . " show'>
        " . $this->icon . "
        <div class='alert_contnet'>
          <h4>" . $this->type . "</h4>
          <p>" . $this->message . "</p>
        </div>
      </div>
      <script>
        setTimeout(() => {
          document.querySelector('.alert').classList.remove('show');
        }, 3000);
      </script>
        ";
  }

  public function load_alert_template($template, $data)
  {
    $template = file_get_contents(ROOT . 'templates/alert/' . $template . '.php');
    foreach ($data as $key => $value) {
      $template = str_replace('{{' . $key . '}}', $value, $template);
    }
    echo $template;
  }

  public function show_custom_alert($template, $extra = [])
  {
    $data = [
      'icon' => $this->icon,
      'type' => $this->type,
      'message' => $this->message
    ];
    $data = array_merge($data, $extra);

    $this->load_alert_template($template, $data);
  }
}
