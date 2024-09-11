import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { ChefHat, Flame, Thermometer, Timer } from "lucide-react"
import Image from "next/image"
import Link from "next/link"

export default function HornoLandingPage() {
  return (
    <div className="flex flex-col min-h-screen">
      <header className="px-4 lg:px-6 h-14 flex items-center">
        <Link className="flex items-center justify-center" href="#">
          <ChefHat className="h-6 w-6" />
          <span className="sr-only">Horno Maestro</span>
        </Link>
        <nav className="ml-auto flex gap-4 sm:gap-6">
          <Link className="text-sm font-medium hover:underline underline-offset-4" href="#">
            Características
          </Link>
          <Link className="text-sm font-medium hover:underline underline-offset-4" href="#">
            Testimonios
          </Link>
          <Link className="text-sm font-medium hover:underline underline-offset-4" href="#">
            Contacto
          </Link>
        </nav>
      </header>
      <main className="flex-1">
        <section className="w-full py-12 md:py-24 lg:py-32 xl:py-48">
          <div className="container px-4 md:px-6">
            <div className="grid gap-6 lg:grid-cols-[1fr_400px] lg:gap-12 xl:grid-cols-[1fr_600px]">
              <Image
                alt="Horno Maestro 3000"
                className="mx-auto aspect-video overflow-hidden rounded-xl object-cover object-center sm:w-full lg:order-last"
                height="310"
                src="/placeholder.svg"
                width="550"
              />
              <div className="flex flex-col justify-center space-y-4">
                <div className="space-y-2">
                  <h1 className="text-3xl font-bold tracking-tighter sm:text-5xl xl:text-6xl/none">
                    Horno Maestro 3000
                  </h1>
                  <p className="max-w-[600px] text-muted-foreground md:text-xl">
                    El horno perfecto para cada chef. Cocina con precisión y estilo.
                  </p>
                </div>
                <div className="flex flex-col gap-2 min-[400px]:flex-row">
                  <Button size="lg">Comprar ahora</Button>
                  <Button size="lg" variant="outline">
                    Más información
                  </Button>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section className="w-full py-12 md:py-24 lg:py-32 bg-muted">
          <div className="container px-4 md:px-6">
            <h2 className="text-3xl font-bold tracking-tighter sm:text-5xl mb-12 text-center">Características</h2>
            <div className="grid gap-6 lg:grid-cols-3 lg:gap-12">
              <Card>
                <CardContent className="flex flex-col items-center space-y-4 p-6">
                  <Thermometer className="h-12 w-12 text-primary" />
                  <h3 className="text-xl font-bold">Control preciso de temperatura</h3>
                  <p className="text-muted-foreground text-center">
                    Ajusta la temperatura con precisión para resultados perfectos en cada plato.
                  </p>
                </CardContent>
              </Card>
              <Card>
                <CardContent className="flex flex-col items-center space-y-4 p-6">
                  <Timer className="h-12 w-12 text-primary" />
                  <h3 className="text-xl font-bold">Temporizador inteligente</h3>
                  <p className="text-muted-foreground text-center">
                    Programa tus cocciones con facilidad y recibe notificaciones cuando estén listas.
                  </p>
                </CardContent>
              </Card>
              <Card>
                <CardContent className="flex flex-col items-center space-y-4 p-6">
                  <Flame className="h-12 w-12 text-primary" />
                  <h3 className="text-xl font-bold">Cocción uniforme</h3>
                  <p className="text-muted-foreground text-center">
                    Distribución de calor optimizada para una cocción uniforme en todos tus platos.
                  </p>
                </CardContent>
              </Card>
            </div>
          </div>
        </section>
        <section className="w-full py-12 md:py-24 lg:py-32">
          <div className="container px-4 md:px-6">
            <h2 className="text-3xl font-bold tracking-tighter sm:text-5xl mb-12 text-center">Testimonios</h2>
            <div className="grid gap-6 lg:grid-cols-2 lg:gap-12">
              <Card>
                <CardContent className="p-6">
                  <p className="text-muted-foreground mb-4">
                    "El Horno Maestro 3000 ha revolucionado mi cocina. La precisión en la temperatura y la cocción
                    uniforme han elevado la calidad de mis platos."
                  </p>
                  <p className="font-semibold">María González, Chef Profesional</p>
                </CardContent>
              </Card>
              <Card>
                <CardContent className="p-6">
                  <p className="text-muted-foreground mb-4">
                    "Increíblemente fácil de usar. El temporizador inteligente me permite hacer otras tareas mientras
                    cocino sin preocuparme por el tiempo."
                  </p>
                  <p className="font-semibold">Carlos Rodríguez, Entusiasta de la Cocina</p>
                </CardContent>
              </Card>
            </div>
          </div>
        </section>
      </main>
      <footer className="flex flex-col gap-2 sm:flex-row py-6 w-full shrink-0 items-center px-4 md:px-6 border-t">
        <p className="text-xs text-muted-foreground">© 2023 Horno Maestro. Todos los derechos reservados.</p>
        <nav className="sm:ml-auto flex gap-4 sm:gap-6">
          <Link className="text-xs hover:underline underline-offset-4" href="#">
            Términos de servicio
          </Link>
          <Link className="text-xs hover:underline underline-offset-4" href="#">
            Privacidad
          </Link>
        </nav>
      </footer>
    </div>
  )
}