import React from "react"
import Authenticated from "@/Layouts/Authenticated"
import { Head } from "@inertiajs/inertia-react"
import Button from "@mui/material/Button"
import NewSessionModal from "@/Components/NewSessionModal"

export default function Log(props) {
  const [isNewSessionModalOpen, setIsNewSessionModalOpen] =
    React.useState(false)
  const autocomplete_movements = props.movements.map(movement => {
    return { label: movement.name, id: movement.id }
  })
  return (
    <Authenticated
      auth={props.auth}
      errors={props.errors}
      header={
        <h2 className="font-semibold text-xl text-gray-800 leading-tight">
          {" "}
          Log{" "}
        </h2>
      }
    >
      <Head title="Log" />
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg text-right">
            <Button onClick={() => setIsNewSessionModalOpen(true)}>
              {" "}
              New Sessions{" "}
            </Button>
            <NewSessionModal
              onClose={() => setIsNewSessionModalOpen(false)}
              isOpen={isNewSessionModalOpen}
              movements={autocomplete_movements}
            />
          </div>
        </div>
      </div>
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            {props.performed_sessions.map((session, i) => (
              <div key={i} className="p-6 bg-white border-b border-gray-200">
                {" "}
                {session.performed_date}{" "}
              </div>
            ))}
          </div>
        </div>
      </div>
    </Authenticated>
  )
}
